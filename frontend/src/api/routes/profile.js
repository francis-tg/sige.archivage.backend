import React, { useEffect } from 'react';
import { logoutAPI } from '../api/auth';
import { useHistory } from 'react-router-dom';

const Logout = () => {
  const history = useHistory();

  useEffect(() => {
    const logout = async () => {
      try {
        const response = await logoutAPI();
        if (response.ok) {
          // Handle successful logout
          console.log('Logout successful');
          history.push('/login'); // Redirect to login page
        } else {
          // Handle logout error
          console.error('Logout failed');
        }
      } catch (error) {
        console.error('Logout error:', error);
      }
    };

    logout();
  }, [history]);

  return <div>Logging out...</div>;
};

export default Logout;
