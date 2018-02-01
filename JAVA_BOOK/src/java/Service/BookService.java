/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package Service;

import java.io.Serializable;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;
import javax.persistence.Query;
import Entity.Book;

/**
 *
 * @author Admin
 */
public class BookService implements Serializable{
    EntityManagerFactory emf = Persistence.createEntityManagerFactory("BookAppPU");
    EntityManager em = emf.createEntityManager();
    public List getAll() {
        String jpql = "SELECT b FROM Book b";
        Query query = em.createQuery(jpql);
        List result = query.getResultList();
        return result;
    }
     public void add(Book sanpham) {
            Book elec = new Book();
            elec.setName(sanpham.getName());
            elec.setPublisher(sanpham.getPublisher());
            elec.setPage(sanpham.getPage());
            em.getTransaction().begin();
            em.persist(elec);
            em.getTransaction().commit();
     }
     
     public Book getBook(int ProId) {
        String jpql = "Book.findByBookId";
        Query query = em.createNamedQuery(jpql);
        query.setParameter("bookId", ProId);
        Book result = (Book) query.getSingleResult();
        return result;
    }
      public void updateBook (Book cate) {
          Book elec = em.find(Book.class, cate.getBookId());
        if (elec != null) {
            elec.setName(cate.getName());
            elec.setPage(cate.getPage());
             elec.setPublisher(cate.getPublisher());
            em.getTransaction().begin();
            em.merge(elec);
            em.getTransaction().commit();
        }
    }
      
       public void deleteById(int keyDelete) {
         Book elec = em.find(Book.class, keyDelete);
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
