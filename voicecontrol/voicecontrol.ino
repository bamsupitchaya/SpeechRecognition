#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>

#ifndef STASSID
#define STASSID "bamberror"
#define STAPSK  "12345678"
#define relay_pin01 D1
#define relay_pin02 D2
#define relay_pin03 D3
#endif

const char* ssid     = STASSID;
const char* password = STAPSK;

const char* device_id;
const char* status_name; 

void setup() {
  Serial.begin(9600);
  pinMode(relay_pin01,OUTPUT);
  pinMode(relay_pin02,OUTPUT);
  pinMode(relay_pin03,OUTPUT);
  // We start by connecting to a WiFi network

  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  /* Explicitly set the ESP8266 to be a WiFi-client, otherwise, it by default,
     would try to act as both a client and an access-point and could cause
     network-issues with your other WiFi-devices on your WiFi-network. */
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
   int de;
   for(de=1;de<=3;de++)
   {
     read_json(de);
   }
  
   //delay(1000);
}

void read_json(int id){
  HTTPClient http;
  String url;
  url="http://speechcontrol.ga/json.php?device_id="+String(id);
   Serial.println(url);
  http.begin(url);
  int httpCode = http.GET();              
  // Serial.println(httpCode);
  //delay(1000);                                              
  if (httpCode > 0){
    const size_t bufferSize = JSON_OBJECT_SIZE(2) + JSON_OBJECT_SIZE(3) + JSON_OBJECT_SIZE(5) + JSON_OBJECT_SIZE(8) + 370;
    DynamicJsonBuffer jsonBuffer(bufferSize);
    JsonObject& root = jsonBuffer.parseObject(http.getString());
    device_id = root["device_id"];
    status_name = root["status_name"]; 
    Serial.print("device_id is:");
    Serial.println(String(device_id));
     Serial.print("status_name:");
    Serial.println(String(status_name));
    ation_relay(id,String(status_name));
   
   
  }
  http.end();
 // delay(1000);
  
}


void ation_relay(int device_id,String status_name) {


  if(device_id==1)
  {
      if(status_name=="ON")
      {
        Serial.println("RELAY_1 OPEN");
        digitalWrite(relay_pin01, LOW);
      }
      else
      {
         Serial.println("RELAY_1 OFF");
         digitalWrite(relay_pin01, HIGH);
      }
  }

  if(device_id==2)
  {
      if(status_name=="ON")
      {
        Serial.println("RELAY_2 OPEN");
        digitalWrite(relay_pin02, LOW);
      }
      else
      {
         Serial.println("RELAY_2 OFF");
         digitalWrite(relay_pin02, HIGH);
      }
  }

  if(device_id==3)
  {
      if(status_name=="ON")
      {
        Serial.println("RELAY_3 OPEN");
        digitalWrite(relay_pin03, HIGH);
      }
      else
      {
         Serial.println("RELAY_2 OFF");
         digitalWrite(relay_pin03, LOW);
      }
  }
 
}
