package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.TextView

class gestionHabitaciones : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_gestion_habitaciones)

        val btnVolverGH = findViewById<TextView>(R.id.btnVolverGH)
        val btnInsertarHabitacion = findViewById<Button>(R.id.btnInsertarHabitacion)
        val btnEliminarHabitacion = findViewById<Button>(R.id.btnEliminarHabitacion)
        val btnActualizarHabitacion = findViewById<Button>(R.id.btnActualizarHabitacion)

        btnVolverGH.setOnClickListener{
            val intent = Intent(applicationContext,gestionHabitacion::class.java)
            startActivity(intent)
        }

        btnInsertarHabitacion.setOnClickListener {
            val intent = Intent(applicationContext,insertarHabitaciones::class.java)
            startActivity(intent)
        }

        btnEliminarHabitacion.setOnClickListener {
            val intent = Intent(applicationContext, eliminarHabitaciones::class.java)
            startActivity(intent)
        }

        btnActualizarHabitacion.setOnClickListener {
            val intent = Intent(applicationContext, solicitarActualizarHabitacion::class.java)
            startActivity(intent)
        }

    }
}