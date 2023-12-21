import React from 'react'

export default function Index() {
    const handleSubmit = (e) => {
        e.preventDefault()
        const { email, password } = e.target.elements
        window.axios.post('/login', {
            email: email.value,
            password: password.value,
        }).then((res) => {
            console.log(res)
        }).catch((err) => {
            console.log(err)
        })
    }
    return (
        <main className='w-10/12 mx-auto'>
            <h1 className='text-6xl font-bold my-8 text-center'>Login</h1>
            <form className='flex flex-col items-center gap-8' onSubmit={handleSubmit}>
                <div className='border p-2 rounded-md w-full flex flex-col'>
                    <label htmlFor='email' className='font-bold'>Email</label>
                    <input className='' type='email' name='email' id='email' />
                </div>
                <div className='border p-2 rounded-md w-full flex flex-col'>
                    <label htmlFor='password' className='font-bold'>Password</label>
                    <input type='password' name='password' id='password' />
                </div>
                <button className='w-1/2 bg-blue-200 hover:bg-blue-500 transition-colors hover:text-white rounded-md py-4 px-6' type='submit'>Login</button>
            </form>
        </main>
    )
}
