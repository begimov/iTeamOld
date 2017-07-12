<?php namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;


class UploadController extends Controller
{
    protected $user;
    protected $path = 'filemanager/userfiles';

    public function __construct()
    {
        $this->user = Auth::user();
    }
	
	
    public function ret()
    {
		return 'content';
	}
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$content = '<form method=post enctype=multipart/form-data><input type=file multiple name=file[]><input type=hidden name=_token value='.csrf_token().'><input type=submit></form>';
		return view('c.simple', compact('content'));
	}
    public function store(Request $request, $name = 'file')
    {
		if($files = $request->file($name)) {

			$out = ['in'=>0,'out'=>0,'files'=>[],'errors'=>[],'messages'=>[]];
			if(is_array($files)) {
				$out['in'] = count($files);
				foreach($files AS $file) {
					$outs = $this->upload($file);
					if($outs[0]==='error') {
						$out['errors'][] = $outs[1];
					}
					else {
						$out['files'][] = $outs[1];
						$out['out']++;
					}
				}
			}
			else {
				$out['in'] = 1;
				$outs = $this->upload($files);
				if($outs[0]==='error') {
					$out['errors'][] = $outs[1];
				}
				else {
					$out['files'][] = $outs[1];
					$out['out']++;
				}
			}
			
			return $out;
		}
		//return redirect()->back()->with('error','Нет файлов для загрузки');
		$out['messages'][] = 'Нет файлов для загрузки';
		return $out;
	}
	
    public function ajaxUploadFromUrl(Request $request)
    {
		#if($request->ajax()) {
			$out = ['error','Нет файла для загрузки'];
			if($file = $request->input("file")) {

				/*
				$outs = $this->upload($file);
				if($outs[0]==='error') {
					$out['errors'][] = $outs[1];
				}
				else {
					$out['files'][] = $outs[1];
					$out['out']++;
				}
				*/
				
				$destinationPath = 'filemanager/userfiles/user0/upload/'.date('Y');
				@mkdir($destinationPath);
				$destinationPath .= '/'.date('m');
				@mkdir($destinationPath);
				
				$image = \Image::make($file);
				
				$filename = md5($file . time());
				switch ($image->mime) {
					case 'image/png': 
						$filename .= '.png';
						break;
					case 'image/jpeg': 
						$filename .= '.jpg';
						break;
					case 'image/gif':
						$filename .= '.gif';
						break;
				}
				if($image && $filename) {
					$image
						->widen(600, function ($constraint) {
							$constraint->aspectRatio();
							$constraint->upsize();
						})
						->save($destinationPath . '/' . $filename);
					
				}

				$out = ['success','/'.$destinationPath.'/'.$filename];

				
			}
			//return redirect()->back()->with('error','Нет файлов для загрузки');
			//return 'ok';
			return response()->json($out);
		#}
		#else return 'ok';
		
	}
	
    protected function upload(UploadedFile $file)
    {
							
		$user = $this->user;			
		$filecustompath = '';
		
		$errors = [];
		$validator = \Validator::make(
			['file'=> $file,],
			['file' => 'image|mimes:png,gif,jpeg|max:2097152|dimensions:min_width=100,min_height=100,max_width=3200,max_height=3200',],
			['file.image' => 'Допустимые форматы: png,jpg,jpeg,gif',
			 'file.mimes' => 'Допустимые форматы: png,jpg,jpeg,gif',
			 'file.max' => 'Размер не должен превышать 2Мб',
			 'file.dimensions' => 'Изображение должно иметь размер не меньше 100 и не больше 1600 точек (пикселей) по каждой из сторон.',
			]
		);

		if ($validator->fails()) {
			//return redirect()->back()->withErrors($validator)->withInput();
			$errors_array = $validator->messages()->toArray();
			$errors = $errors_array['file'];
			
			array_unshift($errors, 'Ошибка при загрузке файла ' . $file->getClientOriginalName());
			//dd($errors);
		}
		
		if($validator->passes()){
			
			$destinationPath = 'filemanager/userfiles/user'.$user->id . ($filecustompath ? '/'.$filecustompath : '' );
			#
			$document_root = $_SERVER['DOCUMENT_ROOT'];
			#$filename = md5(time() . rand(1,5)).'.'.$file->extension();
			$filename = md5($file->getFilename()) . '.' . $file->extension();
			
			$upload_success = $file->move($destinationPath, $filename);
			
			if($upload_success) {
				
				$image = $document_root . '/' . $destinationPath . '/' . $filename;
				list($width, $height, $type) = getimagesize($image);
				
				$max_size = 1920;
				
				if($width>$max_size || $height>$max_size) {
					
					$biggest = ($width>$height) ? $width : $height;
					#$percent = 0.5;
					$percent = $max_size/$biggest;
					#$ratio = $width/$height;

					$newwidth = $width * $percent;
					$newheight = $height * $percent;

					$thumb = imagecreatetruecolor($newwidth, $newheight);
					switch ($type)
					{
						case 1:   //   gif -> jpg
							$im = imagecreatefromgif($image);
							break;
						case 2:   //   jpeg -> jpg
							$im = imagecreatefromjpeg($image); 
							break;
						case 3:  //   png -> jpg
							$im = imagecreatefrompng($image);
							break;
					 }
					imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

					switch ($type)
					{
						case 1: imagegif($thumb, $image);
							break;
						case 2: imagejpeg($thumb, $image, 85);
							break;
						case 3: imagepng($thumb, $image);
							break;
					}
					#imagejpeg($thumb, $image);
					imagedestroy($thumb);

				}
				
				$img = \Image::make($image);

				$exif = $img->exif();
				$rotations =  [0, 0, 0, -180, 0, -90,  -90, 90, 90];
				if(isset($exif['Orientation']) && $exif['Orientation'] && isset($rotations[$exif['Orientation']]) && $rotations[$exif['Orientation']]) $img = $img->rotate($rotations[$exif['Orientation']]);
				
				//@mkdir($document_root . '/' . $destinationPath . '/200');
				@mkdir($destinationPath . '/1600');
				@mkdir($destinationPath . '/800');
				
				@mkdir($destinationPath . '/200');
				@mkdir($destinationPath . '/100');
				
				//$img->widen(1600)->heighten(1600)->save($destinationPath . '/1600/' . $filename);
				$img->widen(1600, function ($constraint) {
							$constraint->aspectRatio();
							$constraint->upsize();
						})
						->heighten(1600, function ($constraint) {
							$constraint->aspectRatio();
							$constraint->upsize();
						})->save($destinationPath . '/1600/' . $filename);
				$img->widen(800, function ($constraint) {
							$constraint->aspectRatio();
							$constraint->upsize();
						})
						->heighten(800, function ($constraint) {
							$constraint->aspectRatio();
							$constraint->upsize();
						})->save($destinationPath . '/800/' . $filename);
				$img->widen(200, function ($constraint) {
							$constraint->aspectRatio();
							$constraint->upsize();
						})->save($destinationPath . '/200/' . $filename);

				$img->fit(100,100)->save($destinationPath . '/100/' . $filename);
				
			}

		}
		
		return ($errors) ? ['error',$errors] : ['success',$upload_success->getFilename()];
	}
	
	
    private function orienta($img = null)
    {
		$img = \Image::make($img);
		
		$exif = $img->exif();
		$rotations =  [0, 0, 0, -180, 0, -90,  -90, 90, 90];
		
		if(isset($exif['Orientation']) && $exif['Orientation'] && isset($rotations[$exif['Orientation']]) && $rotations[$exif['Orientation']]) $img = $img->rotate($rotations[$exif['Orientation']]);
		
		return $img->widen(1600)->heighten(1600)->resize(1600, null, function ($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		})->response('png');
	}
	
	public function uploadFuckFiles(Request $request)
	{
			$user = $this->user;
			
			$content = null;
			$filecustompath = 'before';
			
			if($files = $request->file('files')) {
				
				$filescount = count($files);
				$uploadcount = 0;
				$filesnames = '';
				
				if(!$filescount) redirect()->back()->with('error','Файлы не выбраны');
				
				foreach($files as $fi => $file) {
					
					$validator = \Validator::make(array('file'=> $file), [
						'file' => 'image|max:100000|mimes:png,gif,jpeg',
					],
					[
						'file.image' => 'Допустимые форматы: png,jpg,jpeg,gif',
						'file.mimes' => 'Допустимые форматы: png,jpg,jpeg,gif',
						'file.max' => 'Размер не должен превышать 100Мб',
					]);

					if ($validator->fails()) {
						return redirect()->back()
									->withErrors($validator)
									->withInput();
					}
					
					if($validator->passes()){
						
						$destinationPath = 'filemanager/userfiles/user'.$user->id . ($filecustompath ? '/'.$filecustompath : '' );
						#
						$filename = md5(time() . $fi).'.'.$file->extension();
						
						$upload_success = $file->move($destinationPath, $filename);
						
						if($upload_success) {
							
							$upload = '/' . $destinationPath . '/' . $filename;
							$image = $_SERVER['DOCUMENT_ROOT'].$upload;
							list($width, $height, $type) = getimagesize($image);
							
							$max_size = 800;
							
							if($width>$max_size || $height>$max_size) {
								
								$biggest = ($width>$height) ? $width : $height;
								#$percent = 0.5;
								$percent = $max_size/$biggest;
								#$ratio = $width/$height;

								$newwidth = $width * $percent;
								$newheight = $height * $percent;

								$thumb = imagecreatetruecolor($newwidth, $newheight);
								switch ($type)
								{
									case 1:   //   gif -> jpg
										$im = imagecreatefromgif($image);
										break;
									case 2:   //   jpeg -> jpg
										$im = imagecreatefromjpeg($image); 
										break;
									case 3:  //   png -> jpg
										$im = imagecreatefrompng($image);
										break;
								 }
								imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

								switch ($type)
								{
									case 1: imagegif($thumb, $image);
										break;
									case 2: imagejpeg($thumb, $image, 85);
										break;
									case 3: imagepng($thumb, $image);
										break;
								}
								#imagejpeg($thumb, $image);
								imagedestroy($thumb);

							}
							
						}
						
						
						$filesnames .= '<img src="/'.$upload_success.'">';
						$uploadcount ++;
					}
				}
				
				if($uploadcount == $filescount){
					$content = $filesnames;
					dd($content);
				} 
				else {
					return ('Превышен лимт загрузок, попробуйте завтра');
				}
				
			}
			
			return ('Неизвестная ошибка при загрузке');#return response()->json(['error'=>'nofiles']);		

	}
	
	public function uploadFiles(Request $request)
	{
		if($request->ajax()) {

			if($files = $request->file('files')) {
				
				$filescount = count($files);
				$uploadcount = 0;
				$filesnames = '';
				
				foreach($files as $file) {
					//$rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
					//$validator = Validator::make(array('file'=> $file), $rules);
					//if($validator->passes()){
						$destinationPath = 'filemanager/userfiles/user1';
						$filename = $file->getClientOriginalName();
						$upload_success = $file->move($destinationPath, $filename);
						//$filesnames .=  $filename . ', ' . $upload_success . ',';
						$filesnames .= '<img src="/'.$upload_success.'">';
						$uploadcount ++;
					//}
				}
				
				if($uploadcount == $filescount){
					$complete =  'succes: ' . $filesnames;
					//Session::flash('success', 'Upload successfully'); 
					//return Redirect::to('upload');
				} 
				else {
					$complete = 'error';
					$filesnames = '';
					//return Redirect::to('upload')->withInput()->withErrors($validator);
				}
				
				
				return response()->json(['complete'=>$complete, 'files'=>$filesnames]);
			}
			return response()->json(['error'=>'nofiles']);		
		}
		else return 'fuck';#redirect()->back();
	}

}