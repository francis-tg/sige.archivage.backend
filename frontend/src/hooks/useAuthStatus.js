import { useEffect, useState, useRef } from 'react'
import { AUTH_ME_API } from '../api'
/* import { AUTH_STATUS_API } from '../lib/api' */

export const useAuthStatus = () => {
  const [loggedIn, setLoggedIn] = useState(false)
  const [checkingStatus, setCheckingStatus] = useState(true)
  const isMounted = useRef(true)
  const token = sessionStorage.getItem('token')
  useEffect(() => {
    if (isMounted) {
      try {
        const { url, ...rest } = AUTH_ME_API
        
         fetch(url, { ...rest, credentials:"include"}).then(async (res) => {
          if (res.status === 200) {
            
            const data = await res.json()
            const { token, token_type, user } = data
            console.log(data)
            setLoggedIn(true)
             sessionStorage.setItem('token', token)
            sessionStorage.setItem('type_token', token_type)
            sessionStorage.setItem('user', JSON.stringify(user)) 
            setCheckingStatus(false)
            
          }
          else {
            setCheckingStatus(false)
          }
        }).catch(function(err){
          setCheckingStatus(false)
          console.log(err)
        }) 
        /* if (sessionStorage.getItem('token')) {
          setLoggedIn(true)
          //sessionStorage.setItem("user", JSON.stringify(user))
          setCheckingStatus(false)
          console.log(loggedIn)
        } else {
          setCheckingStatus(false)
        } */
      } catch (error) {
        setCheckingStatus(false)
        console.log(error)
      }
    }
    return () => {
      isMounted.current = false
    }
  }, [isMounted,token])
  return { loggedIn, checkingStatus }
}

// Protected routes in v6
// https://stackoverflow.com/questions/65505665/protected-route-with-firebase

// Fix memory leak warning
// https://stackoverflow.com/questions/59780268/cleanup-memory-leaks-on-an-unmounted-component-in-react-hooks