package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button

class GestionUsuarios : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_gestion_usuarios)

        val btnSalirUsuarios = findViewById<Button>(R.id.btnSalirUsuarios)
        val btnInsertarUsuarios = findViewById<Button>(R.id.btnInsertarUsuarios)
        val btnEliminarGU = findViewById<Button>(R.id.btnEliminarGU)
        val btnActualizarGU = findViewById<Button>(R.id.btnActualizarGU)

        btnSalirUsuarios.setOnClickListener{
            val intent = Intent(applicationContext,menuPrincipal::class.java)
            startActivity(intent)
        }

        btnInsertarUsuarios.setOnClickListener{
            val intent = Intent(applicationContext,Registrarse::class.java)
            startActivity(intent)
        }

        btnEliminarGU.setOnClickListener{
            val intent = Intent(applicationContext,eliminarUsuarios::class.java)
            startActivity(intent)
        }

        btnActualizarGU.setOnClickListener {
            val intent = Intent(applicationContext,solicitarActualizar::class.java)
            startActivity(intent)
        }

    }
}