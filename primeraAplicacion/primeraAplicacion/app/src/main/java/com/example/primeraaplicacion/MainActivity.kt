package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.TextView

class MainActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        val noTenerCuenta = findViewById<TextView>(R.id.noTenerCuenta)
        val btnIngresar = findViewById<Button>(R.id.btnIngresar)

        noTenerCuenta.setOnClickListener{
            val intent = Intent(applicationContext,Registrarse::class.java)
            startActivity(intent)
        }

        btnIngresar.setOnClickListener{
            val intent = Intent(applicationContext,menuPrincipal::class.java)
            startActivity(intent)
        }
    }
}