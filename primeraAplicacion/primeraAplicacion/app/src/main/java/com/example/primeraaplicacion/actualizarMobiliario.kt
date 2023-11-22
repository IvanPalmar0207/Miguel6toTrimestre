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
import com.android.volley.toolbox.JsonObjectRequest
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley

class actualizarMobiliario : AppCompatActivity() {

    var cajaCamasSencillasAC:EditText?=null
    var cajaCamasDoblesAC:EditText?=null
    var cajaCamasTriplesAC:EditText?=null
    var cajaCamasMatrimonialesAC:EditText?=null
    var cajaTelevisoresAC:EditText?=null
    var cajaBanosAC:EditText?=null
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_actualizar_mobiliario)

        val codigo_mB = intent.getStringExtra("codigo_mB").toString()
        cajaCamasSencillasAC = findViewById(R.id.cajaCamasSencillasAC)
        cajaCamasDoblesAC = findViewById(R.id.cajaCamasDoblesAC)
        cajaCamasTriplesAC = findViewById(R.id.cajaCamasTriplesAC)
        cajaCamasMatrimonialesAC = findViewById(R.id.cajaCamasMatrimonialesAC)
        cajaTelevisoresAC = findViewById(R.id.cajaTelevisoresAC)
        cajaBanosAC = findViewById(R.id.cajaBanosAC)

        val btnVolverGSAC = findViewById<TextView>(R.id.btnVolverGSAC)
        val btnActualizarMobiliario = findViewById<Button>(R.id.btnActualizarMobiliario)

        val queue = Volley.newRequestQueue(this)
        val url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_mobiliario/seleccionarMobiliario.php?codigo_mB=$codigo_mB"
        val jsonObjectRequest= JsonObjectRequest(
            Request.Method.GET,url,null,
            { response ->
                cajaCamasSencillasAC?.setText(response.getString("camasSencillas_mB"))
                cajaCamasDoblesAC?.setText(response.getString("camasDobles_mB"))
                cajaCamasTriplesAC?.setText(response.getString("camasTriples_mB"))
                cajaCamasMatrimonialesAC?.setText(response.getString("camasMatrimoniales_mB"))
                cajaTelevisoresAC?.setText(response.getString("numeroTelevisores_mB"))
                cajaBanosAC?.setText(response.getString("numeroBanos_mB"))
            }, { error ->
                Toast.makeText(this, "No se encontro ningun mobiliario con ese codigo", Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext,gestionMobiliario::class.java)
                startActivity(intent)
            }
        )
        queue.add(jsonObjectRequest)

        btnVolverGSAC.setOnClickListener{
            val intent = Intent(applicationContext,seleccionarMobiliario::class.java)
            startActivity(intent)
        }

        btnActualizarMobiliario.setOnClickListener {
            val sencilla = cajaCamasSencillasAC?.text.toString()
            val dobles = cajaCamasDoblesAC?.text.toString()
            val triples = cajaCamasTriplesAC?.text.toString()
            val matrimoniales = cajaCamasMatrimonialesAC?.text.toString()
            val televisores = cajaTelevisoresAC?.text.toString()
            val banos = cajaBanosAC?.text.toString()

            if(sencilla.equals("") || dobles.equals("") || triples.equals("") || matrimoniales.equals("") || televisores.equals("") || banos.equals("")){
                Toast.makeText(applicationContext,"No pueden haber campos vacios",Toast.LENGTH_LONG).show()
            }else{
                mobiliarioActualizar()
            }
        }
    }

    private fun mobiliarioActualizar(){
        val codigo_mB = intent.getStringExtra("codigo_mB").toString()
        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/habitaciones/tb_mobiliario/actualizarMobiliario.php?codigo_mB=$codigo_mB"
        var queue= Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"El mobiliario se ha actualizado correctamente",Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, gestionMobiliario::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "Error al actualizar el mobiliario, error: $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("camasSencillas_mB", cajaCamasSencillasAC?.text.toString());
                parametros.put("camasDobles_mB", cajaCamasDoblesAC?.text.toString());
                parametros.put("camasTriples_mB", cajaCamasTriplesAC?.text.toString());
                parametros.put("camasMatrimoniales_mB", cajaCamasMatrimonialesAC?.text.toString());
                parametros.put("numeroTelevisores_mB", cajaTelevisoresAC?.text.toString());
                parametros.put("numeroBanos_mB", cajaBanosAC?.text.toString());
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }

}