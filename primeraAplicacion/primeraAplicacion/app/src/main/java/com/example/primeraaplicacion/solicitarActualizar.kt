package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.EditText
import android.widget.TextView
import android.widget.Toast

class solicitarActualizar : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_solicitar_actualizar)

        val btnVolverSolicitudAct = findViewById<TextView>(R.id.btnVolverSolicitudAct)
        btnVolverSolicitudAct.setOnClickListener{
            val intent = Intent(applicationContext,GestionUsuarios::class.java)
            startActivity(intent)
        }
    }
    fun solicitudActualizarUsu(view: View){
        val cajaSolicitarNumeroDoc = findViewById<EditText>(R.id.cajaSolicitarNumeroDoc)
        val cajaNumeroDoc = cajaSolicitarNumeroDoc.text.toString()
        if (cajaNumeroDoc.equals("")) {
            Toast.makeText(applicationContext,"El numero de documento no puede estar vacio",Toast.LENGTH_LONG).show()
        }else{
            val intent = Intent(applicationContext, actualizarUsuario::class.java)
            intent.putExtra("numeroDocumento_usu", cajaSolicitarNumeroDoc.text.toString())
            startActivity(intent)
        }
    }
}