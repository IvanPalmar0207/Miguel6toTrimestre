package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.EditText
import android.widget.TextView
import android.widget.Toast

class solicitarActualizarHabitacion : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_solicitar_actualizar_habitacion)

        val btnVolverSeleccionarHabitacion = findViewById<TextView>(R.id.btnVolverSeleccionarHabitacion)

        btnVolverSeleccionarHabitacion.setOnClickListener {
            val intent = Intent(applicationContext,gestionHabitaciones::class.java)
            startActivity(intent)
        }
    }

    fun solicitudActualizarHabitacion(view: View){
        val cajaCodigoHabitacionSeleccionar = findViewById<EditText>(R.id.cajaCodigoHabitacionSeleccionar)
        if(cajaCodigoHabitacionSeleccionar?.text.toString().equals("")){
            Toast.makeText(applicationContext,"El numero de la habitacion no puede ser un dato vacio",Toast.LENGTH_LONG).show()
        }else{
            val intent = Intent(applicationContext, actualizarHabitaciones::class.java)
            intent.putExtra("numero_hab",cajaCodigoHabitacionSeleccionar?.text.toString())
            startActivity(intent)
        }
    }

}