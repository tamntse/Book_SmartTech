<%-- 
    Document   : update.jsp
    Created on : Jan 24, 2018, 2:59:24 PM
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
        <h1>書籍の編集</h1>
         <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                              <c:set var="sanpham" value="${requestScope.UPDATEBOOK}"/>
                            <form class="m-t" method="POST" action="ProcessServlet">
                                  <input type="hidden" name="txtId" class="form-control" value="${sanpham.bookId}">
  
                                    書籍名:
                                    <input type="text" name="txtName" class="form-control" value="${sanpham.name}" required="required">
                                </div>
                                <div class="form-group">
                                    出版社名:
                                    <input type="text" name="txtPub" class="form-control" value="${sanpham.publisher}" required="required">
                                </div>
                                <div class="form-group">
                                   ページ数:
                                    <input type="text" name="txtPage" class="form-control" value="${sanpham.page}" required="required">
                                </div>
                                   <button type="submit" class="btn btn-primary block full-width m-b" name="btAction" value="UpdateSubmit">送信</button>
                                   <button type="submit" class="btn btn-primary block full-width m-b" name="btAction" value="BackHomeSbumit">戻す</button>
                            </form>
                        </div>
                    </div>
         </div>
    </body>
</html>
