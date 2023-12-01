package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button

class gestionHabitacion : AppCompatActivity() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_gestion_habitacion)

        val btnVolverGHab = findViewById<Button>(R.id.btnVolverGHab)
        val btnTipoHabitacion = findViewById<Button>(R.id.btnTipoHabitacion)
        val btnMobiliario = findViewById<Button>(R.id.btnMobiliario)
        val btnHabitacion = findViewById<Button>(R.id.btnHabitacion)

        btnVolverGHab.setOnClickListener {
            val intent = Intent(applicationContext, menuPrincipal::class.java)
            startActivity(intent)
        }

        btnTipoHabitacion.setOnClickListener {
            val intent = Intent(applicationContext, gestionTipoHabitacion::class.java)
            startActivity(intent)
        }

        btnMobiliario.setOnClickListener {
            val intent = Intent(applicationContext,gestionMobiliario::class.java)
            startActivity(intent)
        }

        btnHabitacion.setOnClickListener {
            val intent = Intent(applicationContext, gestionHabitaciones::class.java)
            startActivity(intent)
        }

    }
}