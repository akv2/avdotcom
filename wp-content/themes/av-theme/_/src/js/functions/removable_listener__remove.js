_.removable_listener__remove = ( el, event ) => {

  // Only if it's possible
  if( el.removable_events === undefined ) return;

  // Handle namespaces
  let namespace = 'default';
  if( event.includes('.') ) {
    const arr = event.split('.');
    event = arr[0];
    namespace = arr[1];
  }

  // Loop events to find with our namespace
  el.removable_events.forEach( ( removable_event_obj, i ) => {

    // Check namespace
    if( removable_event_obj.namespace !== namespace ) return;

    // Remove listener
    el.removeEventListener( removable_event_obj.event, removable_event_obj.handler );

    // Remove from element
    el.removable_events.splice( i, 1 );
  });

}