package com.example.primeraaplicacion

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import android.widget.Toast
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley

class insertarMobiliario : AppCompatActivity() {

    var cajaCamasSencillasIn:EditText?=null
    var cajaCamasDoblesIn:EditText?=null
    var cajaCamasTriplesIn:EditText?=null
    var cajaCamasMatrimonialesIn:EditText?=null
    var cajaTelevisoresIn:EditText?=null
    var cajaBanosIn:EditText?=null
    var cajaCodigoTipoHabitacion:EditText?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_insertar_mobiliario)

        cajaCamasDoblesIn = findViewById(R.id.cajaCamasDoblesIn)
        cajaCamasSencillasIn = findViewById(R.id.cajaCamasSencillasIn)
        cajaCamasTriplesIn = findViewById(R.id.cajaCamasTriplesIn)
        cajaCamasMatrimonialesIn = findViewById(R.id.cajaCamasMatrimonialesIn)
        cajaTelevisoresIn = findViewById(R.id.cajaTelevisoresIn)
        cajaBanosIn = findViewById(R.id.cajaBanosIn)
        cajaCodigoTipoHabitacion = findViewById(R.id.cajaCodigoTipoHabitacion)

        val btnVolverGSIN = findViewById<TextView>(R.id.btnVolverGSIN)
        val btnAgregarMobiliario = findViewById<Button>(R.id.btnAgregarMobiliario)

        btnVolverGSIN.setOnClickListener{
            val intent = Intent(applicationContext,gestionMobiliario::class.java)
            startActivity(intent)
        }

        btnAgregarMobiliario.setOnClickListener {

            val camasSencillas = cajaCamasSencillasIn?.text.toString()
            val camasDobles = cajaCamasDoblesIn?.text.toString()
            val camasTriples = cajaCamasTriplesIn?.text.toString()
            val camasMatrimoniales = cajaCamasMatrimonialesIn?.text.toString()
            val numeroTelevisores = cajaTelevisoresIn?.text.toString()
            val numeroBanos = cajaBanosIn?.text.toString()
            val codigo_tpH = cajaCodigoTipoHabitacion?.text.toString()

            if(camasSencillas.equals("") || camasDobles.equals("") || camasTriples.equals("") || camasMatrimoniales.equals("") || numeroTelevisores.equals("") || numeroBanos.equals("") || codigo_tpH.equals("")){
                Toast.makeText(applicationContext,"No puedes ingresar campos vacios, intenta nuevamente", Toast.LENGTH_LONG).show()
            }else{
                agregarMobiliario()
            }
        }

    }

    private fun agregarMobiliario(){
        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_mobiliario/insertarMobiliario.php"
        var queue= Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"El mobiliario se ha ingresado correctamente",Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, gestionMobiliario::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "Error al ingresar usuario $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("camasSencillas_mB", cajaCamasSencillasIn?.text.toString());
                parametros.put("camasDobles_mB", cajaCamasDoblesIn?.text.toString());
                parametros.put("camasTriples_mB", cajaCamasTriplesIn?.text.toString());
                parametros.put("camasMatrimoniales_mB", cajaCamasMatrimonialesIn?.text.toString());
                parametros.put("numeroTelevisores_mB", cajaTelevisoresIn?.text.toString());
                parametros.put("numeroBanos_mB", cajaBanosIn?.text.toString());
                parametros.put("codigo_tpH", cajaCodigoTipoHabitacion?.text.toString())
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }
}