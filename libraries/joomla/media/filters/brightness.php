<?php
/**
 * @package     Joomla.Platform
 * @subpackage  Media
 *
 * @copyright   Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_PLATFORM') or die();

jimport('joomla.media.imagefilter');

/**
 * Image Filter class adjust the brightness of an image.
 *
 * @package     Joomla.Platform
 * @subpackage  Media
 * @since       11.3
 */
class JImageFilterBrightness extends JImageFilter
{
	/**
	 * Method to apply a filter to an image resource.
	 *
	 * @param   array  $options  An array of options for the filter.
	 *
	 * @return  void
	 *
	 * @since   11.3
	 * @throws  InvalidArgumentException
	 * @throws  RuntimeException
	 */
	public function execute(array $options = array())
	{
		// Verify that image filter support for PHP is available.
		if (!function_exists('imagefilter'))
		{
			JLog::add('The imagefilter function for PHP is not available.', JLog::ERROR);
			throw new RuntimeException;
		}

		// Validate that the brightness value exists and is an integer.
		if (!isset($options[IMG_FILTER_BRIGHTNESS]) || !is_int($options[IMG_FILTER_BRIGHTNESS]))
		{
			JLog::add('No valid brightness value was given.', JLog::ERROR);
			throw new InvalidArgumentException;
		}

		// Perform the brightness filter.
		imagefilter($this->handle, IMG_FILTER_BRIGHTNESS, $options[IMG_FILTER_BRIGHTNESS]);
	}
}
