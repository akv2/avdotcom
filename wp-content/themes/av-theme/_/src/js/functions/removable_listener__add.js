_.removable_listener__add = ( el, event, handler ) => {
  
  // Handle namespaces
  let namespace = 'default';
  if( event.includes('.') ) {
    const arr = event.split('.');
    event = arr[0];
    namespace = arr[1];
  }

  // Instantiate
  if( el.removable_events === undefined ) el.removable_events = [];

  // Save for later
  el.removable_events.push( { 'namespace': namespace, 'event': event, 'handler': handler });

  // Actually add the listener
  el.addEventListener( event, handler );

}