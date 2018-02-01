/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package Service;

import Entity.Book;
import Entity.Comment;
import java.io.Serializable;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;
import javax.persistence.Query;

/**
 *
 * @author Admin
 */
public class CommentService implements Serializable{
    EntityManagerFactory emf = Persistence.createEntityManagerFactory("BookAppPU");
    EntityManager em = emf.createEntityManager();
    
     public List getAll() {
        String jpql = "SELECT b FROM Comment b";
        Query query = em.createQuery(jpql);
        List result = query.getResultList();
        return result;
    }
      public void add(Comment sanpham) {
           Comment elec = new Comment();
            elec.setName(sanpham.getName());
            elec.setBookId(sanpham.getBookId());
            em.getTransaction().begin();
            em.persist(sanpham);
            em.getTransaction().commit();
     }
     public Comment getComment(int ProId) {
        String jpql = "Comment.findById";
        Query query = em.createNamedQuery(jpql);
        query.setParameter("id", ProId);
        Comment result = (Comment) query.getSingleResult();
        return result;
    }
     public List SearchById(int ProId) {
        String jpql = "SELECT s FROM Comment s WHERE s.bookId :id";
        Query query = em.createQuery(jpql);
        query.setParameter("id", "%" + ProId + "%");
        List result = query.getResultList();
        return result;
    }
      public void updateBook (Comment cate) {
          Comment elec = em.find(Comment.class, cate.getId());
        if (elec != null) {
           
            em.getTransaction().begin();
            em.merge(elec);
            em.getTransaction().commit();
        }
    }
      
       public void deleteById(int keyDelete) {
         Comment elec = em.find(Comment.class, keyDelete);
        if (elec != null) {
            em.getTransaction().begin();
            em.remove(elec);
            em.getTransaction().commit();
        }
    }
       
    public void persist(Object object) {
        EntityManager em = emf.createEntityManager();
        try {
            em.getTransaction().begin();
            em.persist(object);
            em.getTransaction().commit();
        } catch (Exception e) {
            Logger.getLogger(getClass().getName()).log(Level.SEVERE, "exception caught", e);
            em.getTransaction().rollback();
        } finally {
            em.close();
        }
    }
    
}
