package com.example.todolistspring.repository;

import com.example.todolistspring.model.Tarea;
import com.example.todolistspring.model.Usuario;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;
import java.util.Optional;

public interface TareaRepository extends JpaRepository<Tarea, Long> {
    List<Tarea> findByUsuario(Usuario usuario);
    Optional<Tarea> findByIdAndUsuario(Long id, Usuario usuario);
}
