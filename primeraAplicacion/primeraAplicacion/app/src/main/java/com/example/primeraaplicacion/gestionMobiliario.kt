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

        val btnVolverMobiliarioGS = findViewById<TextView>(R.id.btnVolverMobiliarioGS)
        val btnInsertarMobiliario = findViewById<Button>(R.id.btnInsertarMobiliario)
        val btnEliminarMobiliario = findViewById<Button>(R.id.btnEliminarMobiliario)
        val btnSeleccionarMobiliario = findViewById<Button>(R.id.btnSeleccionarMobiliario)

        btnVolverMobiliarioGS.setOnClickListener{
            val intent = Intent(applicationContext,gestionHabitacion::class.java)
            startActivity(intent)
        }

        btnInsertarMobiliario.setOnClickListener {
            val intent = Intent(applicationContext,insertarMobiliario::class.java)
            startActivity(intent)
        }

        btnEliminarMobiliario.setOnClickListener {
            val intent = Intent(applicationContext,eliminarMobiliario::class.java)
            startActivity(intent)
        }

        btnSeleccionarMobiliario.setOnClickListener {
            val intent = Intent(applicationContext,seleccionarMobiliario::class.java)
            startActivity(intent)
        }

    }
}