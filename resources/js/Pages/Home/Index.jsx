import React from 'react'
import { Link } from '@inertiajs/react'

export default function Home({ gyms }) {
    return (
        <div className='w-10/12 mx-auto'>
            <h1 className='text-6xl font-bold'>Home</h1>
            <div className='grid grid-cols-3 gap-4'>
                {gyms.map(gym => (
                    <div className='bg-gray-200 rounded-lg shadow-lg p-4' key={gym.slug}>
                        <h2 className='text-2xl font-bold'>{gym.name}</h2>
                        <Link href={`/gyms/${gym.slug}`} className='text-blue-500'>View Gym</Link>
                    </div>
                ))}
            </div>
        </div>
    )
}
