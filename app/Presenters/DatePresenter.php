<?php namespace App\Presenters;

use Carbon\Carbon;

trait DatePresenter {

	/**
	 * Format created_at attribute
	 *
	 * @param Carbon  $date
	 * @return string
	 */
	public function getCreatedAtAttribute($date)
	{
		return $this->getDateTimeFormated($date);
	}

	/**
	 * Format updated_at attribute
	 *
	 * @param Carbon  $date
	 * @return string
	 */
	public function getUpdatedAtAttribute($date)
	{
		return $this->getDateTimeFormated($date);
	}

	/**
	 * Format date
	 *
	 * @param Carbon  $date
	 * @return string
	 */
	private function getDateTimeFormated($date)
	{
		return Carbon::parse($date)->format(config('app.locale') == 'ru' ? 'd.m.Y H:i:s' : 'Y-m-d H:i:s');
	}

}