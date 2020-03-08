import React from 'react';
import Routes from './routes/Routes';
import { createStore } from 'redux'
import { Provider } from 'react-redux'
import reducer from '../reducers/reducer'

const store = createStore(reducer, undefined, undefined)

const App: React.FC = () => {

  return (
    <Provider store={store}>
      <Routes />
    </Provider>
  );
}

export default App;
