<%-- 
    Document   : comment
    Created on : Jan 24, 2018, 3:51:09 PM
    Author     : Admin
--%>

<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>書籍一覧</title>
        <link href="resource/css/bootstrap.min.css" rel="stylesheet">
        <link href="resource/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="resource/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
        <link href="resource/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
        <link href="resource/css/animate.css" rel="stylesheet">
        <link href="resource/css/style.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/autofill/2.1.3/css/autoFill.dataTables.min.css" rel="stylesheet">
    </head>
    <body>
        <h1>感想一覧</h1>
             <c:set var="sanphams" value="${requestScope.COMMENTS}"/>
        <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            
                            <div class="ibox-title">
                                <c:url var="AddSanpham" value="addCommentServlet">
                                    <c:forEach var="sanpham" items="${sanphams}" varStatus="counter">
                                            <c:param name="txtId" value="${sanpham.id}"/>
                                    </c:forEach>
                                 
                                </c:url>
                                <a href="${AddSanpham}" class="btn btn-primary">追加</a>
                            </div>
                            
                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                                        <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 100px;">ID.</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 206.2px;">コメント</th>
                                                
                                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 206.2px;">操作</th>
                                                </tr>
                                            </thead>
                                            <tbody>   
                                        
                                                <c:forEach var="sanpham" items="${sanphams}" varStatus="counter">
                                                    <tr class="gradeA odd" role="row">
                         
                                                        <td class="sorting_1">${sanpham.id}</td>
                                                        <c:set var="cate" value="${sanpham.name}"/>
                                                            <td class="sorting_1">${sanpham.name}</td>
                                                        <td class="center">
                                                            <c:url var="UpdateSanpham" value="UpdateCommentServlet">
                                                                <c:param name="txtId" value="${sanpham.id}"/>
                                                            </c:url>
                                                            <a href="${UpdateSanpham}" class="btn btn-primar">修正</a>
                                                            <c:url var="DeleteSanpham" value="DeleteCommentServlet">
                                                                <c:param name="txtId" value="${sanpham.id}"/>
                                                            </c:url>
                                                            <a href="${DeleteSanpham}" class="btn btn-danger ">削除</a>
                          
                                                        </td>
                                                    </tr>
                                                </c:forEach>
                                            </tbody>
                                        </table>
                                                <form class="m-t" method="POST" action="ProcessServlet">
                                                     <button type="submit" class="btn btn-primary block full-width m-b" name="btAction" value="BackHomeSbumit">戻す</button>
                                                </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                                
                                                    <!-- Mainly scripts -->
    <script src="resource/js/jquery-2.1.1.js"></script>
    <script src="resource/js/bootstrap.min.js"></script>
    <script src="resource/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="resource/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="resource/js/jquery-2.1.1.js"></script>
    <script src="resource/js/bootstrap.min.js"></script>
    <script src="resource/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="resource/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="resource/js/inspinia.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="resource/js/inspinia.js"></script>
    <script src="resource/js/plugins/pace/pace.min.js"></script>
    <script src="resource/js/plugins/wow/wow.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},
                    {extend: 'print',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                        }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable('../example_ajax.php', {
                "callback": function(sValue, y) {
                    var aPos = oTable.fnGetPosition(this);
                    oTable.fnUpdate(sValue, aPos[0], aPos[1]);
                },
                "submitdata": function(value, settings) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition(this)[2]
                    };
                },
                "width": "90%",
                "height": "100%"
            });


        });
    </script>
    
    </body>
</html>