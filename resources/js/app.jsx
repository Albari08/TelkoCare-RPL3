import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Routes, Navigate } from "react-router-dom";
import UserDashboard from './components/UserDashboard';
import AdminLogin from './components/AdminLogin';
import DoctorLogin from './components/DoctorLogin';
import UserLogin from './components/UserLogin';

const App = () => (
  <Router>
    <Routes>
      <Route path="/" element={<Navigate to="/user/dashboard" replace />} />
      <Route path="/admin/login" element={<AdminLogin />} />
      <Route path="/doctor/login" element={<DoctorLogin />} />
      <Route path="/user/login" element={<UserLogin />} />
      <Route path="/user/dashboard" element={<UserDashboard />} />
    </Routes>
  </Router>
);

ReactDOM.render(<App />, document.getElementById('app'));