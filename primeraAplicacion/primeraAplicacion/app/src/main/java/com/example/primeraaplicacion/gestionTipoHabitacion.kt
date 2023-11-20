package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.TextView

class gestionTipoHabitacion : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_gestion_tipo_habitacion)

        val btnVolverTiposHabitacion = findViewById<TextView>(R.id.btnVolverTiposHabitacion)
        val btnInsertarTipoHabitacion = findViewById<Button>(R.id.btnInsertarTipoHabitacion)
        val btnEliminarTipoHabGES = findViewById<Button>(R.id.btnEliminarTipoHabGES)
        val btnSeleccionarTpHab = findViewById<Button>(R.id.btnSeleccionarTpHab)

        btnVolverTiposHabitacion.setOnClickListener {
            val intent = Intent(applicationContext, gestionHabitacion::class.java)
            startActivity(intent)
        }

        btnInsertarTipoHabitacion.setOnClickListener {
            val intent = Intent(applicationContext,insercionTipoHabitacion::class.java)
            startActivity(intent)
        }

        btnEliminarTipoHabGES.setOnClickListener {
            val intent = Intent(applicationContext, eliminarTipoHabitacion::class.java)
            startActivity(intent)
        }

        btnSeleccionarTpHab.setOnClickListener {
            val intent = Intent(applicationContext,seleccionarTipoHabitacion::class.java)
            startActivity(intent)
        }

    }
}