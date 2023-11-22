package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import android.widget.Toast

class seleccionarMobiliario : AppCompatActivity() {

    var cajaCodigoMobiliarioSEL:EditText?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_seleccionar_mobiliario)

        cajaCodigoMobiliarioSEL = findViewById(R.id.cajaCodigoMobiliarioSEL)

        val btnVolverSeleccionMOB = findViewById<TextView>(R.id.btnVolverSeleccionMOB)

        btnVolverSeleccionMOB.setOnClickListener{
            val intent = Intent(applicationContext, gestionMobiliario::class.java)
            startActivity(intent)
        }

    }

    fun solicitudActualizarMob(view: View){
        val cajaCodigoMobiliarioSEL = findViewById<EditText>(R.id.cajaCodigoMobiliarioSEL)
        val codigotpH = cajaCodigoMobiliarioSEL?.text.toString()
        if (codigotpH.equals("")) {
            Toast.makeText(
                applicationContext,
                "El codigo del mobiliario no puede estar vacio",
                Toast.LENGTH_LONG
            ).show()
        } else {
            val intent = Intent(applicationContext, actualizarMobiliario::class.java)
            intent.putExtra("codigo_mB", cajaCodigoMobiliarioSEL?.text.toString())
            startActivity(intent)
        }
    }

}