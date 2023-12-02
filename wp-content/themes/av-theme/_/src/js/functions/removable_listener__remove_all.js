_.removable_listener__remove_all = ( el ) => {

  // Only if it's possible
  if( el.removable_events === undefined ) return;


  // Loop events to find with our namespace
  el.removable_events.forEach( ( removable_event_obj ) => {

    // Remove listener
    el.removeEventListener( removable_event_obj.event, removable_event_obj.handler );
    
  });

  // Clear out storage
  el.removable_events = [];

}