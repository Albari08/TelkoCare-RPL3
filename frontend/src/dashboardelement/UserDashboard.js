import React from 'react';
import ReactDOM from 'react-dom';

function UserDashboard() {
    return (
        <div className="dashboard-container">
            <h1>User Dashboard</h1>
            <p>Welcome, User!</p>
            {/* Komponen read rekam medis */}
            <div>
                <a href="/medical-records">View Medical Records</a>
            </div>
        </div>
    );
}

export default UserDashboard;

if (document.getElementById('user-dashboard')) {
    ReactDOM.render(<UserDashboard />, document.getElementById('user-dashboard'));
}
