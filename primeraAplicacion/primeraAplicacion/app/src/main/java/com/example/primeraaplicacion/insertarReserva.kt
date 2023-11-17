package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.TextView

class insertarReserva : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_insertar_reserva)

        val btnVolverGestionUsu = findViewById<TextView>(R.id.btnVolverGestionUsu)

        btnVolverGestionUsu.setOnClickListener{
            val intent = Intent(applicationContext,gestionReservas::class.java)
            startActivity(intent)
        }

    }
}