<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%@page import="org.owasp.esapi.ESAPI"%>
<%@page import="org.owasp.esapi.errors.AccessControlException"%>


<%
try {
	ESAPI.accessController().assertAuthorizedForURL(request.getRequestURI());%>
	<font color=green><h1>Congratulations you have the access to this page!</h1></font>
	
	<h4>ESAPI.accessController().isAuthorizedForURL(request.getRequestURI()) : &nbsp;&nbsp;
		<%=ESAPI.accessController().isAuthorizedForURL(request.getRequestURI()) %></h4>

<%} catch (AccessControlException e) {%>

	<font color=red><h1>Sorry you do not have the access to this page!</h1></font>
	Log Message: <%=e.getLogMessage()%>
	<h4>ESAPI.accessController().isAuthorizedForURL(request.getRequestURI()) : &nbsp;&nbsp;
		<%=ESAPI.accessController().isAuthorizedForURL(request.getRequestURI()) %></h4>
	
<%} %>