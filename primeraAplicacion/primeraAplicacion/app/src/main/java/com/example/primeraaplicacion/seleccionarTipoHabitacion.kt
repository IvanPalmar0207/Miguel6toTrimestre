package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import android.widget.Toast

class seleccionarTipoHabitacion : AppCompatActivity() {

    var cajaCodigoTipoHabSeleccionar:EditText?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_seleccionar_tipo_habitacion)

        val btnVolverSeleccionarTipoHab = findViewById<TextView>(R.id.btnVolverSeleccionarTipoHab)

        cajaCodigoTipoHabSeleccionar = findViewById(R.id.cajaCodigoTipoHabSeleccionar)

        btnVolverSeleccionarTipoHab.setOnClickListener{
            val intent = Intent(applicationContext, gestionTipoHabitacion::class.java)
            startActivity(intent)
        }

    }

    fun solicitudActualizarTipoHab(view: View) {
        val cajaCodigoTipoHabSeleccionar = findViewById<EditText>(R.id.cajaCodigoTipoHabSeleccionar)
        val codigotpH = cajaCodigoTipoHabSeleccionar?.text.toString()
        if (codigotpH.equals("")) {
            Toast.makeText(
                applicationContext,
                "El codigo del tipo de hab no puede estar vacio",
                Toast.LENGTH_LONG
            ).show()
        } else {
            val intent = Intent(applicationContext, actualizarTipoHabitacion::class.java)
            intent.putExtra("codigo_tpH", cajaCodigoTipoHabSeleccionar?.text.toString())
            startActivity(intent)
        }
    }
}