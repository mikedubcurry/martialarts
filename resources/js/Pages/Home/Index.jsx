import React from 'react'
import { Link } from '@inertiajs/react'

export default function Home({ gyms, disciplines, user }) {
    // create array of session/recovery days spanning the last 30 days
    console.log(user)
    return (
        <>
            <header className='flex justify-between items-center px-8 py-4 border-b'>
                <h1 className='font-bold text-3xl'>Martial Arts</h1>
                <div className='flex items-center'>
                    <div className='rounded-full h-10 w-10 bg-gray-400'></div>
                </div>
            </header>
            <main className='w-10/12 mx-auto py-4'>
                <div className=''>
                    <Link href='/sessions/create' className='w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Record New Session</Link>
                </div>

                <div className='mt-4'>
                    <h2 className='text-2xl font-bold'>Past Sessions</h2>
                    <div className=''>
                        <ul className=''>
                            {user.gym_sessions.map((session) => (
                                <li className='flex justify-between items-center border-b py-2 hover:bg-gray-50' key={session.id}>
                                    <div className='flex items-center gap-4'>
                                        <p>{session.date}</p>
                                        <p>{session.discipline.discipline}</p>
                                        <p>{session.start_time}</p>
                                        <p>{session.end_time}</p>
                                    </div>
                                </li>
                            ))}
                        </ul>
                    </div>
                </div>
                <div className='mt-4'>
                    <h2 className='text-2xl font-bold'>Recovery</h2>
                    <div className=''>
                        <ul className=''>
                            {user.recoveries.map((recovery) => (
                                <li className='flex justify-between items-center border-b py-2 hover:bg-gray-50' key={recovery.id}>
                                    <div className='flex items-center gap-4'>
                                        <p>{recovery.date}</p>
                                        <p>{recovery.type}</p>
                                        <p>{recovery.notes}</p>
                                    </div>
                                </li>
                            ))}
                        </ul>
                    </div>
                </div>
                <div className='mt-4'>
                    <h2 className='text-2xl font-bold'>Explore Martial Arts</h2>
                    <div className=''>
                        <ul className=''>
                            {disciplines.map((discipline) => (
                                <li className='flex justify-between items-center border-b py-2 hover:bg-gray-50' key={discipline.id}>
                                    <div className='w-full flex justify-between items-center gap-4'>
                                        <p>{discipline.discipline}</p>
                                        <button className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Find a Gym</button>
                                    </div>
                                </li>
                            ))}
                        </ul>
                    </div>
                </div>
            </main>
        </>
    )
}
