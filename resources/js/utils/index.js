export function valueUpdater(updaterOrValue, stateRef) {
    if (typeof updaterOrValue === 'function') {
      stateRef.value = updaterOrValue(stateRef.value)
    } else {
      stateRef.value = updaterOrValue
    }
  }