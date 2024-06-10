import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch, Redirect } from 'react-router-dom';
import UserDashboard from './components/UserDashboard';
import Login from './components/Login';

const App = () => (
  <Router>
    <Switch>
      <Route exact path="/" render={() => <Redirect to="/user/dashboard" />} />
      <Route path="/user/login" component={Login} />
      <Route path="/user/dashboard" component={UserDashboard} />
      {/* Add other routes here */}
    </Switch>
  </Router>
);

ReactDOM.render(<App />, document.getElementById('app'));
