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
 * @author 
 * @created 2008
 * @since 1.4
 * @package org.owasp.esapi
 */

/**
 * The Logger interface defines a set of methods that can be used to log
 * security events. It supports a hierarchy of logging levels which can be configured at runtime to determine
 * the severity of events that are logged, and those below the current threshold that are discarded.
 * Implementors should use a well established logging library
 * as it is quite difficult to create a high-performance logger.
 * <P>
 * <img src="doc-files/Logger.jpg">
 * <P>
 * 
 * The logging levels defined by this interface (in descending order) are:
 * <ul>
 * <li>fatal (highest value)</li>
 * <li>error</li>
 * <li>warning</li>
 * <li>info</li>
 * <li>debug</li>
 * <li>trace (lowest value)</li>
 * </ul>
 * 
 * This Logger allows callers to determine which logging levels are enabled, and to submit events 
 * at different severity levels.<br>
 * <br>Implementors of this interface should:
 * 
 * <ol>
 * <li>provide a mechanism for setting the logging level threshold that is currently enabled. This usually works by logging all 
 * events at and above that severity level, and discarding all events below that level.
 * This is usually done via configuration, but can also be made accessible programmatically.</li>
 * <li>ensure that dangerous HTML characters are encoded before they are logged to defend against malicious injection into logs 
 * that might be viewed in an HTML based log viewer.</li>
 * <li>encode any CRLF characters included in log data in order to prevent log injection attacks.</li>
 * <li>avoid logging the user's session ID. Rather, they should log something equivalent like a 
 * generated logging session ID, or a hashed value of the session ID so they can track session specific 
 * events without risking the exposure of a live session's ID.</li> 
 * <li>record the following information with each event:</li>
 *   <ol type="a">
 *   <li>identity of the user that caused the event,</li>
 *   <li>a description of the event (supplied by the caller),</li>
 *   <li>whether the event succeeded or failed (indicated by the caller),</li>
 *   <li>severity level of the event (indicated by the caller),</li>
 *   <li>that this is a security relevant event (indicated by the caller),</li>
 *   <li>hostname or IP where the event occurred (and ideally the user's source IP as well),</li>
 *   <li>a time stamp</li>
 *   </ol>
 * </ol>
 *  
 * Custom logger implementations might also:
 * <ol start="6">
 * <li>filter out any sensitive data specific to the current application or organization, such as credit cards, 
 * social security numbers, etc.</li>
 * </ol>
 * 
 * In the default implementation, this interface is implemented by JavaLogger, which is an inner class 
 * in JavaLogFactory.java. JavaLogger uses the java.util.logging package as the basis for its logging 
 * implementation. This default implementation implements requirements #1 thru #5 above.<br>
 * <br>
 * Customization: It is expected that most organizations will implement their own custom Logger class in 
 * order to integrate ESAPI logging with their logging infrastructure. The ESAPI Reference Implementation 
 * is intended to provide a simple functional example of an implementation.
 * 
 * @author 
 * @since 1.4
 */

/**
 * Defines the type of log event that is being generated. The Logger interface defines 4 types of Log events: 
 * SECURITY, USABILITY, PERFORMANCE, FUNCTIONALITY. 
 * Your implementation can extend or change this list if desired. The ESAPI reference implementation 
 * generates only SECURITY events.
 */
class EventType
{

    private $type;

    function __construct($name)
    {
        $this->type = $name;
    }

    public function __toString()
    {
        return $this->type;
    }
}

interface Log4PhpLogger
{

    /**
     * The SECURITY type of log event. 
     */
    // public static final EventType SECURITY = new EventType( "SECURITY" );
    //$SECURITY = new EventType("SECURITY");

    /**
     * The USABILITY type of log event. 
     */
    // public static final EventType USABILITY = new EventType( "USABILITY" );
    //$USABILITY = new EventType("USABILITY");

    /**
     * The PERFORMANCE type of log event. 
     */
    // public static final EventType PERFORMANCE = new EventType( "PERFORMANCE" );
    //$PERFORMANCE = new EventType("PERFORMANCE");

    /**
     * The FUNCTIONALITY type of log event. This is the type of event that non-security focused loggers typically log.
     * If you are going to log your existing non-security events in the same log with your security events, you 
     * probably want to use this type of log event.  
     */
    // public static final EventType FUNCTIONALITY = new EventType( "FUNCTIONALITY" );
    //$FUNCTIONALITY = new EventType("FUNCTIONALITY");

    /*
     * The Logger interface defines 6 logging levels: FATAL, ERROR, WARNING, INFO, DEBUG, TRACE. It also 
     * supports ALL, which logs all events, and OFF, which disables all logging.
     * Your implementation can extend or change this list if desired. 
     */

    /** OFF indicates that no messages should be logged. This level is initialized to Integer.MAX_VALUE. */
    //define("OFF" , PHP_INT_MAX);
    

    /** FATAL indicates that only FATAL messages should be logged. This level is initialized to 1000. */
    //define("FATAL",1000);
    

    /** ERROR indicates that ERROR messages and above should be logged. 
     * This level is initialized to 800. */
    //define("ERROR",800);
    

    /** WARNING indicates that WARNING messages and above should be logged. 
     * This level is initialized to 600. */
    //define("WARNING",600);
    

    /** INFO indicates that INFO messages and above should be logged. 
     * This level is initialized to 400. */
    //define("INFO",400);
    

    /** DEBUG indicates that DEBUG messages and above should be logged. 
     * This level is initialized to 200. */
    //define("DEBUG",200);
    
    /** TRACE indicates that TRACE messages and above should be logged. 
     * This level is initialized to 100. */
    //define("TRACE",100);
    

    // public static final int ALL = Integer . MIN_VALUE;
    //define("ALL",(-1 * PHP_INT_MAX ) - 1);
    

    

    /**
     * Dynamically set the logging severity level. All events of this level and higher will be logged from 
     * this point forward for all logs. All events below this level will be discarded.
     * 
     * @param level The level to set the logging level to. 
     */
    function setLevel($level);

    /**
     * Log a fatal level security event if 'fatal' level logging is enabled 
     * and also record the stack trace associated with the event.
     * 
     * @param type 
     * 		the type of event
     * @param success
     * 		False indicates this was a failed event (the typical value).
     * 		True indicates this was a successful event.  
     * @param message 
     * 		the message to log
     * @param throwable 
     * 		the exception to be logged
     */
    function fatal($type, $success, $message, $throwable = null);

    /**
     * Allows the caller to determine if messages logged at this level
     * will be discarded, to avoid performing expensive processing.
     * 
     * @return true if fatal level messages will be output to the log
     */
    function isFatalEnabled();


    /**
     * Log an error level security event if 'error' level logging is enabled 
     * and also record the stack trace associated with the event.
     * 
     * @param type 
     * 		the type of event
     * @param success
     * 		False indicates this was a failed event (the typical value).
     * 		True indicates this was a successful event.  
     * @param message 
     * 		the message to log
     * @param throwable 
     * 		the exception to be logged
     */
    function error($type, $success, $message, $throwable = null);

    /**
     * Allows the caller to determine if messages logged at this level
     * will be discarded, to avoid performing expensive processing.
     * 
     * @return true if error level messages will be output to the log
     */
    function isErrorEnabled();

    /**
     * Log a warning level security event if 'warning' level logging is enabled 
     * and also record the stack trace associated with the event.
     * 
     * @param type 
     * 		the type of event
     * @param success
     * 		False indicates this was a failed event (the typical value).
     * 		True indicates this was a successful event.  
     * @param message 
     * 		the message to log
     * @param throwable 
     * 		the exception to be logged
     */
    function warning($type, $success, $message, $throwable = null);

    /**
     * Allows the caller to determine if messages logged at this level
     * will be discarded, to avoid performing expensive processing.
     * 
     * @return true if warning level messages will be output to the log
     */
    function isWarningEnabled();

    /**
     * Log an info level security event if 'info' level logging is enabled 
     * and also record the stack trace associated with the event.
     * 
     * @param type 
     * 		the type of event
     * @param success
     * 		False indicates this was a failed event (the typical value).
     * 		True indicates this was a successful event.  
     * @param message 
     * 		the message to log
     * @param throwable 
     * 		the exception to be logged
     */
    function info($type, $success, $message, $throwable = null);

    /**
     * Allows the caller to determine if messages logged at this level
     * will be discarded, to avoid performing expensive processing.
     * 
     * @return true if info level messages will be output to the log
     */
    function isInfoEnabled();

    /**
     * Log a debug level security event if 'debug' level logging is enabled 
     * and also record the stack trace associated with the event.
     * 
     * @param type 
     * 		the type of event
     * @param success
     * 		False indicates this was a failed event (the typical value).
     * 		True indicates this was a successful event.  
     * @param message 
     * 		the message to log
     * @param throwable 
     * 		the exception to be logged
     */
    function debug($type, $success, $message, $throwable = null);

    /**
     * Allows the caller to determine if messages logged at this level
     * will be discarded, to avoid performing expensive processing.
     * 
     * @return true if debug level messages will be output to the log
     */
    function isDebugEnabled();

    /**
     * Log a trace level security event if 'trace' level logging is enabled 
     * and also record the stack trace associated with the event.
     * 
     * @param type 
     * 		the type of event
     * @param success
     * 		False indicates this was a failed event (the typical value).
     * 		True indicates this was a successful event.  
     * @param message 
     * 		the message to log
     * @param throwable 
     * 		the exception to be logged
     */
    function trace($type, $success, $message, $throwable = null);

    /**
     * Allows the caller to determine if messages logged at this level
     * will be discarded, to avoid performing expensive processing.
     * 
     * @return true if trace level messages will be output to the log
     */
    function isTraceEnabled();

}