export default function DisciplineModal({ discipline, close }) {
    return (
        <>
            <div onClick={() => close()} className='fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-50'></div>
            <div className='p-8 rounded-xl fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white z-50'>
                <div className='flex justify-between items-center'>
                    <h2 className='text-2xl font-bold'>{discipline.discipline}</h2>
                    <button onClick={() => close()} className='text-2xl font-bold'>X</button>
                </div>
            </div>
        </>
    )
}
