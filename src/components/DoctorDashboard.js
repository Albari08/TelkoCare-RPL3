import React from 'react';
import ReactDOM from 'react-dom';

function DoctorDashboard() {
    return (
        <div className="dashboard-container">
            <h1>Doctor Dashboard</h1>
            <p>Welcome, Doctor!</p>
            {/* Komponen read rekam medis dan add atau update rekam medis */}
            <div>
                <a href="/medical-records">View Medical Records</a>
            </div>
            <div>
                <a href="/medical-records/create">Add Medical Record</a>
            </div>
        </div>
    );
}

export default DoctorDashboard;

if (document.getElementById('doctor-dashboard')) {
    ReactDOM.render(<DoctorDashboard />, document.getElementById('doctor-dashboard'));
}
