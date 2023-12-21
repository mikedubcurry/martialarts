import React from 'react'

export default function Index() {
    const handleSubmit = (e) => {
        e.preventDefault()
        const { email, password } = e.target.elements
        console.log(email.value, password.value)
        // TODO: install axios and make a post request to the backend
    }
    return (
        <main className='w-10/12 mx-auto'>
            <h1>Login</h1>
            <form className='flex flex-col' onSubmit={handleSubmit}>
                <label htmlFor='email'>Email</label>
                <input type='email' name='email' id='email' />
                <label htmlFor='password'>Password</label>
                <input type='password' name='password' id='password' />
                <button type='submit'>Login</button>
            </form>
        </main>
    )
}
