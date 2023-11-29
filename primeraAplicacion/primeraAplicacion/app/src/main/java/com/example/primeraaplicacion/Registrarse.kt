package com.example.primeraaplicacion

import android.content.Intent
import android.os.Bundle
import android.view.View
import android.widget.AdapterView
import android.widget.ArrayAdapter
import android.widget.Button
import android.widget.EditText
import android.widget.Spinner
import android.widget.TextView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.JsonObjectRequest
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import org.json.JSONArray
import org.json.JSONObject


class Registrarse : AppCompatActivity() {
    var nombre_usu:EditText?=null
    var apellidos_usu:EditText?=null
    var numeroDocumento_usu:EditText?=null
    var correoElectronico_usu:EditText?=null
    var contrasena_usu:EditText?=null
    var codigotpd:EditText?=null
    var confirmarContraseña:EditText?=null
    var posicion:String?=null
    var posicionTipoDocumento:String?=null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_registrarse)

        nombre_usu = findViewById(R.id.nombre_usu)
        apellidos_usu = findViewById(R.id.apellidos_usu)
        numeroDocumento_usu = findViewById(R.id.numeroDocumento_usu)
        correoElectronico_usu = findViewById(R.id.correoElectronico_usu)
        contrasena_usu = findViewById(R.id.contrasena_usu)
        /*codigorl = findViewById(R.id.codigorl)*/
        confirmarContraseña = findViewById(R.id.confirmarContraseña)

        val codigorl = findViewById<Spinner>(R.id.codigorl)

        val queue = Volley.newRequestQueue(this)
        val url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/usuarios/seleccionarRol.php"
        val jsonObjectRequest = JsonObjectRequest(
            Request.Method.GET,url,null,
            { response ->
                var players = mutableListOf<String>()

                var JsonArray : JSONArray = response.getJSONArray("data")

                for (i in 0 until JsonArray.length()){
                    var JsonObject = JsonArray.getJSONObject(i)
                    players.add(JsonObject.getString("tipo_rl"))
                }

                val arrayAdapter = ArrayAdapter<String>(this,R.layout.spinnerstyle,players)

                codigorl.adapter = arrayAdapter
                codigorl.onItemSelectedListener = object : AdapterView.OnItemSelectedListener{
                    override fun onItemSelected(
                        p0: AdapterView<*>?,
                        p1: View?,
                        p2: Int,
                        p3: Long) {
                        posicion = (p2+1).toString()
                    }

                    override fun onNothingSelected(p0: AdapterView<*>?) {
                        TODO("Not yet implemented")
                    }

                }
            }, { error ->
                Toast.makeText(this, "No se encontro ningun rol de usuario", Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext,menuPrincipal::class.java)
                startActivity(intent)
            }
        )
        queue.add(jsonObjectRequest)

        val codigotpd = findViewById<Spinner>(R.id.codigotpd)

        val queue1 = Volley.newRequestQueue(this)
        val url1 = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/usuarios/seleccionarTipoDocumento.php"
        val jsonObjectRequest1 = JsonObjectRequest(
            Request.Method.GET,url1,null,
            { response ->
                var players1 = mutableListOf<String>()

                var JsonArray1 : JSONArray = response.getJSONArray("data")

                for (i in 0 until JsonArray1.length()){
                    var JsonObject1 = JsonArray1.getJSONObject(i)
                    players1.add(JsonObject1.getString("tipo_tpD"))
                }

                val arrayAdapter = ArrayAdapter<String>(this,R.layout.spinnerstyle,players1)

                codigotpd.adapter = arrayAdapter
                codigotpd.onItemSelectedListener = object : AdapterView.OnItemSelectedListener{
                    override fun onItemSelected(
                        p0: AdapterView<*>?,
                        p1: View?,
                        p2: Int,
                        p3: Long) {
                        posicionTipoDocumento = (p2+1).toString()
                    }

                    override fun onNothingSelected(p0: AdapterView<*>?) {
                        TODO("Not yet implemented")
                    }

                }
            }, { error ->
                Toast.makeText(this, "No se encontro ningun tipo de documento", Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext,menuPrincipal::class.java)
                startActivity(intent)
            }
        )
        queue1.add(jsonObjectRequest1)


        var btn_Registrarse = findViewById<Button>(R.id.btn_Registrarse)
        var btnVolverGestionUsu = findViewById<TextView>(R.id.btnVolverGestionUsu)


        btn_Registrarse.setOnClickListener {

            val name = nombre_usu?.text.toString()
            val apellidos = apellidos_usu?.text.toString()
            val nombreUsu = numeroDocumento_usu?.text.toString()
            val email = correoElectronico_usu?.text.toString()
            val contrasena = contrasena_usu?.text.toString()
            val contraserRe = confirmarContraseña?.text.toString()

            if(name.equals("") || apellidos.equals("") || nombreUsu.equals("") || email.equals("") || contrasena.equals("") || contraserRe.equals("")){
                Toast.makeText(this,"No se pueden ingresar campos vacios, intenta nuevamente",Toast.LENGTH_LONG).show()
            }
            else if(contrasena != contraserRe){
                    Toast.makeText(this,"Las contraseñas deben de ser iguales, intenta de nuevo",Toast.LENGTH_LONG).show()
            }
            else{
                insertarUsuarios()
            }
        }

        btnVolverGestionUsu.setOnClickListener{
            val intent = Intent(applicationContext,GestionUsuarios::class.java)
            startActivity(intent)
        }

    }

    private fun insertarUsuarios(){

        var url = "https://proyectofinalyd.000webhostapp.com/MiguelAndroid/usuarios/insertarUsuarios.php"
        var queue=Volley.newRequestQueue(this);
        var resultadoResquest = object : StringRequest(
            Request.Method.POST,url,
            Response.Listener{ response ->
                Toast.makeText(this,"Has sido registrado correctamente",Toast.LENGTH_LONG).show()
                val intent = Intent(applicationContext, GestionUsuarios::class.java)
                startActivity(intent)
            }, Response.ErrorListener { error ->
                Toast.makeText(this, "Error al ingresar usuario $error", Toast.LENGTH_LONG).show()
            }){
            override fun  getParams(): MutableMap<String, String> {
                val parametros = HashMap<String, String>()
                parametros.put("nombres_usu", nombre_usu?.text.toString());
                parametros.put("apellidos_usu", apellidos_usu?.text.toString());
                parametros.put("numeroDocumento_usu", numeroDocumento_usu?.text.toString());
                parametros.put("correoElectronico_usu",correoElectronico_usu?.text.toString());
                parametros.put("contrasena_usu",contrasena_usu?.text.toString());
                parametros.put("codigo_rl",posicion.toString());
                parametros.put("codigo_tpD",posicionTipoDocumento.toString())
                return parametros;
            }
        }
        queue.add(resultadoResquest)
    }
}