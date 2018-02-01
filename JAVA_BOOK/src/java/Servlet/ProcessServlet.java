/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package Servlet;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Admin
 */
public class ProcessServlet extends HttpServlet {
  private final String UpdateBookServlet = "UpdateBookServlet";
   private final String UpdateSubmitServlet = "UpdateSubmitServlet";
   private final String nullServlet = "indexServlet";
   private final String BackHomeSbumit = "IndexServlet";
   private final String UpdateComment = "UpdateCommentServlet";
   private final String SearchServlet = "SearchServlet";
   private final String UpdateSanpham = "UpdateSanphamServlet";
   private final String BookingServlet = "BookingServlet";
   private final String AddSubmit = "AddServlet";
   private final String UpdateSubmitComment = "UpdateSubmitCommentServlet";
   private final String AddCommentSubmit = "AddCommentSubmitServlet";
   private final String Update = "UpdateServlet";
    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter();
        try {
            String button = request.getParameter("btAction");
            String url = UpdateBookServlet;
              if (button == null) {
                url = nullServlet;
            } else if (button.equals("UpdateBook")) {
                url = UpdateBookServlet;
            } else if (button.equals("UpdateSubmit")) {
                url = UpdateSubmitServlet;
            } else if (button.equals("BackHomeSbumit")) {
                url = BackHomeSbumit;
            } else if (button.equals("Search")) {
                url = SearchServlet;
            } else if (button.equals("Booking")) {
                url = BookingServlet;
            } else if (button.equals("AddSubmit")) {
                url = AddSubmit;
            } else if (button.equals("AddBook")) {
                url = "addbook.jsp";
            } else if (button.equals("UpdateComment")) {
                url = UpdateComment;
            } else if (button.equals("UpdateSubmitComment")) {
                url = UpdateSubmitComment;
            } else if (button.equals("Update")) {
                url = Update;
            } else if (button.equals("AddCommentSubmit")) {
                url = AddCommentSubmit;
            } 
              RequestDispatcher rd = request.getRequestDispatcher(url);
            rd.forward(request, response);
        } finally {
            out.close();
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
