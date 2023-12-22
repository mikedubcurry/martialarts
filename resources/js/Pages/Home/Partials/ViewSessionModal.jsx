export default function ViewSessionModal({ session, close }) {
    console.log(session)
    return (
        <>
            <div onClick={() => close()} className='fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-50'></div>
            <div className='p-8 rounded-xl fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white z-50'>
                modal
            </div>
        </>
    )
}
