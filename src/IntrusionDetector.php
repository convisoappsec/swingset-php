<?php
/**
 * OWASP Enterprise Security API (ESAPI)
 * 
 * This file is part of the Open Web Application Security Project (OWASP)
 * Enterprise Security API (ESAPI) project. For details, please see
 * <a href="http://www.owasp.org/index.php/ESAPI">http://www.owasp.org/index.php/ESAPI</a>.
 *
 * Copyright (c) 2007 - 2009 The OWASP Foundation
 * 
 * The ESAPI is published by OWASP under the BSD license. You should read and accept the
 * LICENSE before you use, modify, and/or redistribute this software.
 * 
 * @author jah (at jahboite.co.uk)
 * @created 2008
 * @since 1.4
 * @package org.owasp.esapi
 */

require_once dirname(__FILE__).'/errors/IntrusionException.php';


/**
 * The IntrusionDetector interface is intended to track security relevant events and identify attack behavior. The
 * implementation can use as much state as necessary to detect attacks, but note that storing too much state will burden
 * your system.
 * <P>
 * <img src="doc-files/IntrusionDetector.jpg">
 * <P>
 * <P>
 * The interface is currently designed to accept exceptions as well as custom events. Implementations can use this
 * stream of information to detect both normal and abnormal behavior.
 * 
 * @author 
 * @since 1.4
 */
interface IntrusionDetector {

    /**
     * Adds the exception to the IntrusionDetector.  This method should immediately log the exception so that developers throwing an 
     * IntrusionException do not have to remember to log every error.  The implementation should store the exception somewhere for the current user
     * in order to check if the User has reached the threshold for any Enterprise Security Exceptions.  The User object is the recommended location for storing
     * the current user's security exceptions.  If the User has reached any security thresholds, the appropriate security action can be taken and logged.
     * 
     * @param exception 
     * 		the exception thrown
     * 
     * @throws IntrusionException 
     * 		the intrusion exception
     */
    function addException($exception);

    /**
     * Adds the event to the IntrusionDetector.  This method should immediately log the event.  The implementation should store the event somewhere for the current user
     * in order to check if the User has reached the threshold for any Enterprise Security Exceptions.  The User object is the recommended location for storing
     * the current user's security event.  If the User has reached any security thresholds, the appropriate security action can be taken and logged.
     * 
     * @param eventName 
     * 		the event to add
     * @param logMessage 
     * 		the message to log with the event
     * 
     * @throws IntrusionException 
     * 		the intrusion exception
     */
    function addEvent($eventName, $logMessage);

}

/*
 * Intrusion Event.
 */
class Event
{

	public $key;
	public $times = array();
	public $count = 0;
	
	public function __construct($key)
	{
		$this->key = $key;
	}
	
	public function increment($count, $interval)
	{
		$now = time();
		array_unshift($this->times, $now );
		$this->count++;
		
		while ( sizeof($this->times) > $count )
		{
			array_pop($this->times);
		}
		if ( sizeof($this->times) == $count )
		{
			$plong = end($this->times);
			$nlong = time();
			if ( $nlong - $plong > $interval )
			{
				throw new IntrusionException( "Threshold exceeded", "Exceeded threshold for " . $this->key );
			}
		}
	}

}
