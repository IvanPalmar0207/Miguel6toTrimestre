package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button

class eliminarReserva : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_eliminar_reserva)

        val btnConfirmarEliminarReserva = findViewById<Button>(R.id.btnConfirmarEliminarReserva)
        val btnVolverEliminarReserva = findViewById<Button>(R.id.btnVolverEliminarReserva)


        btnConfirmarEliminarReserva.setOnClickListener {

        }

        btnVolverEliminarReserva.setOnClickListener {
            val intent = Intent(applicationContext,gestionReservas::class.java)
            startActivity(intent)
        }

    }
}