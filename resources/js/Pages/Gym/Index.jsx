import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function GymsIndex({ gyms, user }) {
    console.log(gyms)
    return (
        <AuthenticatedLayout user={user}>
            <h2 className='text-2xl font-bold'>Gyms</h2>
        </AuthenticatedLayout>
    )
}
