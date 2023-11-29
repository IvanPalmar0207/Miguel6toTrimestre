package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.TextView

class gestionMobiliario : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_gestion_mobiliario)

        val btnInsertarMobiliario = findViewById<Button>(R.id.btnInsertarMobiliario)
        val btnVolverGM = findViewById<TextView>(R.id.btnVolverGM)
        val btnEliminarMobiliario = findViewById<Button>(R.id.btnEliminarMobiliario)

        btnInsertarMobiliario.setOnClickListener {
            val intent = Intent(applicationContext,insertarMobiliario::class.java)
            startActivity(intent)
        }

        btnVolverGM.setOnClickListener{
            val intent = Intent(applicationContext,gestionHabitacion::class.java)
            startActivity(intent)
        }

        btnEliminarMobiliario.setOnClickListener {
            val intent = Intent(applicationContext,eliminarMobiliario::class.java)
            startActivity(intent)
        }
    }
}