<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* NAME 			: Common Helper
* TYPE 			: Helper
* DEVELOPER 	: Elbert James Olivar
* DATE CREATED 	: October 18, 2015
* DESCRIPTION 	: This contains common helper functions
*/

/**
 * Print array with predifined element
 *
 * @access  public
 * @param   array/string
 */
if ( ! function_exists('print_pre'))
{
    function print_pre($data)
    {
    	if(is_array($data))
    	{
    		echo "<pre>";print_r($data);echo"</pre>";
    	}else
    	{
    		echo "<pre>".$data."</pre>";
    	}
    }
}
/**
 * Encrypt string ina shortened way
 *
 * @access  public
 * @param   array/string
 */
if ( ! function_exists('encode'))
{
    function encode($string)
    {
        $ci =& get_instance();
        return $ci->my_encrypt->encode($string);
    }
}

/**
 * Decrypt encrypted string
 *
 * @access  public
 * @param   array/string
 */
if ( ! function_exists('decode'))
{
    function decode($encrypted_string)
    {
        $ci =& get_instance();
        return $ci->my_encrypt->decode($encrypted_string);
    }
}

/**
 * Check if Admin
 *
 * @access  public
 * @param   array/string
 */
if ( ! function_exists('is_admin'))
{
    function is_admin()
    {
        $ci =& get_instance();
        return $ci->session->userdata('usertype') == 'admin';
    }
}

/**
 * Check if Alumni
 *
 * @access  public
 * @param   array/string
 */
if ( ! function_exists('is_alumni'))
{
    function is_alumni()
    {
        $ci =& get_instance();
        return $ci->session->userdata('usertype') == 'alumni';
    }
}

/**
 * Get user ID
 *
 * @access  public
 * @param   array/string
 */
if ( ! function_exists('user_id'))
{
    function user_id()
    {
        $ci =& get_instance();
        return decode($ci->session->userdata('user_id'));
    }
}