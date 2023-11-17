package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button

class menuPrincipal : AppCompatActivity() {



    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_menu_principal)

        val btnUsuarios = findViewById<Button>(R.id.btnUsuarios)
        val btnSalirPrincipal = findViewById<Button>(R.id.btnSalirPrincipal)
        val btnHabitaciones = findViewById<Button>(R.id.btnHabitaciones)
        val btnReservas = findViewById<Button>(R.id.btnReservas)

        btnUsuarios.setOnClickListener{
            val intent = Intent(applicationContext,GestionUsuarios::class.java)
            startActivity(intent)
        }

        btnSalirPrincipal.setOnClickListener{
            val intent = Intent(applicationContext,MainActivity::class.java)
            startActivity(intent)
        }

        btnHabitaciones.setOnClickListener{
            val intent = Intent(applicationContext,gestionHabitacion::class.java)
            startActivity(intent)
        }

        btnReservas.setOnClickListener {
            val intent = Intent(applicationContext, gestionReservas::class.java)
            startActivity(intent)
        }

    }
}