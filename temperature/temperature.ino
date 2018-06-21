int led = D7;  // The on-board LED
#define DEVICE_NAME "Photon"
#define PARTICLE_EVENT_NAME "dht-logger-log"
// char payload[1024];
// char respEvent[100];
float temperature;
// void myHandler(const char *event, const char *data) {
//   // Handle the integration response
//     strcpy(respEvent, event);  //converts the event name to a string
    
//   if (strstr(event,"hook-response/dht-logger-log") != NULL)  //looks for a specific web hook event
//   {
//       if (strstr(data, "Success") == NULL)  //web hook event data will contain "Success" if successful
//       {                                     //so if strstr is null, "Success" was not in the data
//         sprintf(payload,
//             "{\"device\":\"%s\",\"temperature\":%.2f}",
//             DEVICE_NAME,
//             temperature);
//         Particle.publish(PARTICLE_EVENT_NAME, payload, 60, PRIVATE);  //re-publish current data
//       }
//       else
//       {
//           Particle.publish("AWS-API-Webhook-Status", "Success", 60, PRIVATE);  //web hook was successful so publish status as an event
//       }
//     }
// }
void myHandler(const char *event, const char *data) {
  // Handle the integration response
}

void setup() {
  pinMode(led, OUTPUT);
  Particle.subscribe("hook-response/dht-logger-log", myHandler, MY_DEVICES);
}

void loop() {
  digitalWrite(led, HIGH);   // Turn ON the LED
 
  

  temperature = random(60, 80);
  String data = String::format(
  "{\"temperature\":%.2f}",
  temperature);
  Particle.publish(PARTICLE_EVENT_NAME, data, PRIVATE);
  //Particle.publish("temp", temp, PRIVATE);
  delay(6000);               // Wait for 30 seconds
  
  digitalWrite(led, LOW);    // Turn OFF the LED
  delay(6000);               // Wait for 30 seconds
}