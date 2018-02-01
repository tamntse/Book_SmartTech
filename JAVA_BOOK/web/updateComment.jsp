<%-- 
    Document   : updateComment
    Created on : Jan 24, 2018, 4:14:39 PM
    Author     : Admin
--%>

<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>編集</title>
    </head>
    <body>
        <h1>感想の編集</h1>
         <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                              <c:set var="sanpham" value="${requestScope.UPDATEBOOK}"/>
                            <form class="m-t" method="POST" action="ProcessServlet">
                                  <input type="hidden" name="txtId" class="form-control" value="${sanpham.id}">
                               
                                    コメント:
                                    <input type="text" name="txtName" class="form-control" value="${sanpham.name}" required="required">
                                </div>
                                   <button type="submit" class="btn btn-primary block full-width m-b" name="btAction" value="UpdateSubmitComment">送信</button>
                                   <button type="submit" class="btn btn-primary block full-width m-b" name="btAction" value="BackHomeSbumit">戻す</button>
                            </form>
                        </div>
                    </div>
         </div>
    </body>
</html>