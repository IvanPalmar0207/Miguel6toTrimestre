package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button

class gestionReservas : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_gestion_reservas)

        val btnSalirReservas = findViewById<Button>(R.id.btnSalirReservas)
        val btnEliminarReservaIr = findViewById<Button>(R.id.btnEliminarReservaIr)
        val btnInsertarReservas = findViewById<Button>(R.id.btnInsertarReservas)

        btnSalirReservas.setOnClickListener{
            val intent = Intent(applicationContext,menuPrincipal::class.java)
            startActivity(intent)
        }

        btnEliminarReservaIr.setOnClickListener {
            val intent = Intent(applicationContext,eliminarReserva::class.java)
            startActivity(intent)
        }

        btnInsertarReservas.setOnClickListener {
            val intent = Intent(applicationContext, insertarReserva::class.java)
            startActivity(intent)
        }

    }
}