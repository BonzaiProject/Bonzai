#include <stdio.h>

#ifdef __vax__
#error "Won't work on Vaxen.  See comments at get_last_object."
#endif

int main() {
#ifdef __FILE__
printf("__FILE__: %s\n", __FILE__);
#endif

#ifdef __LINE__
printf("__LINE__: %d\n", __LINE__);
#endif

#ifdef __DATE__
printf("__DATE__: %s\n", __DATE__);
#endif

#ifdef __TIME__
printf("__TIME__: %s\n", __TIME__);
#endif

#ifdef __STDC__
printf("__STDC__: %d\n", __STDC__);
#endif

#ifdef __STDC_VERSION__
printf("__STDC_VERSION__: %s\n", __STDC_VERSION__);
#endif

#ifdef __STDC_HOSTED__
printf("__STDC_HOSTED__: %d\n", __STDC_HOSTED__);
#endif

#ifdef __GNUC__
printf("__GNUC__: %d\n", __GNUC__);
#endif

#ifdef __GNUC_MINOR__
printf("__GNUC_MINOR__: %d\n", __GNUC_MINOR__);
#endif

#ifdef __GNUG__
printf("__GNUG__: %s\n", __GNUG__);
#endif

#ifdef __cplusplus
printf("__cplusplus: %s\n", __cplusplus);
#endif

#ifdef __STRICT_ANSI__
printf("__STRICT_ANSI__: %s\n", __STRICT_ANSI__);
#endif

#ifdef __BASE_FILE__
printf("__BASE_FILE__: %s\n", __BASE_FILE__);
#endif

#ifdef __INCLUDE_LEVEL__
printf("__INCLUDE_LEVEL__: %d\n", __INCLUDE_LEVEL__);
#endif

#ifdef __VERSION__
printf("__VERSION__: %s\n", __VERSION__);
#endif

#ifdef __OPTIMIZE__
printf("__OPTIMIZE__: %s\n", __OPTIMIZE__);
#endif

#ifdef __CHAR_UNSIGNED__
printf("__CHAR_UNSIGNED__: %s\n", __CHAR_UNSIGNED__);
#endif

//#ifdef __REGISTER_PREFIX__
//printf("__REGISTER_PREFIX__: %s\n", __REGISTER_PREFIX__);
//#endif

//#ifdef __USER_LABEL_PREFIX__
//printf("__USER_LABEL_PREFIX__: %s\n", __USER_LABEL_PREFIX__);
//#endif

#ifdef __GNUC_PATCHLEVEL__
printf("__GNUC_PATCHLEVEL__: %d\n", __GNUC_PATCHLEVEL__);
#endif

#ifdef __OPTIMIZE_SIZE__
printf("__OPTIMIZE_SIZE__: %s\n", __OPTIMIZE_SIZE__);
#endif

#ifdef __NO_INLINE__
printf("__NO_INLINE__: %d\n", __NO_INLINE__);
#endif

#ifdef __CHAR_BIT__
printf("__CHAR_BIT__: %d\n", __CHAR_BIT__);
#endif

#ifdef __INT_SHORT__
printf("__INT_SHORT__: %s\n", __INT_SHORT__);
#endif

#ifdef __SCHAR_MAX__
printf("__SCHAR_MAX__: %d\n", __SCHAR_MAX__);
#endif

#ifdef __SHRT_MAX__
printf("__SHRT_MAX__: %d\n", __SHRT_MAX__);
#endif

#ifdef __INT_MAX__
printf("__INT_MAX__: %d\n", __INT_MAX__);
#endif

#ifdef __LONG_MAX__
printf("__LONG_MAX__: %ld\n", __LONG_MAX__);
#endif

#ifdef __LONG_LONG_MAX__
printf("__LONG_LONG_MAX__: %lld\n", __LONG_LONG_MAX__);
#endif


#ifdef unix
printf("unix: %d\n", unix);
#endif

#ifdef BSD
printf("BSD: %s\n", BSD);
#endif

#ifdef vax
printf("vax: %s\n", vax);
#endif

#ifdef mc68000
printf("mc68000: %s\n", mc68000);
#endif

#ifdef m68k
printf("m68k: %s\n", m68k);
#endif

#ifdef M68020
printf("M68020: %s\n", M68020);
#endif

#ifdef _AM29K
printf("_AM29K: %s\n", _AM29K);
#endif

#ifdef _AM29000
printf("_AM29000: %s\n", _AM29000);
#endif

#ifdef ns32000
printf("ns32000: %s\n", ns32000);
#endif

#ifdef sun
printf("sun: %s\n", sun);
#endif

#ifdef pyr
printf("pyr: %s\n", pyr);
#endif

#ifdef sequent
printf("sequent: %s\n", sequent);
#endif


#ifdef __cplusplus_cli
printf("__cplusplus_cli: %s\n", __cplusplus_cli);
#endif

#ifdef __embedded_cplusplus
printf("__embedded_cplusplus: %s\n", __embedded_cplusplus);
#endif

#ifdef _POSIX_VERSION
printf("_POSIX_VERSION: %s\n", _POSIX_VERSION);
#endif

#ifdef _POSIX2_C_VERSION
printf("_POSIX2_C_VERSION: %s\n", _POSIX2_C_VERSION);
#endif

#ifdef _XOPEN_VERSION
printf("_XOPEN_VERSION: %s\n", _XOPEN_VERSION);
#endif

#ifdef _XOPEN_UNIX
printf("_XOPEN_UNIX: %s\n", _XOPEN_UNIX);
#endif

#ifdef __TURBOC__
printf("__TURBOC__: %s\n", __TURBOC__);
#endif

#ifdef __BORLANDC__
printf("__BORLANDC__: %s\n", __BORLANDC__);
#endif

#ifdef __COMO__
printf("__COMO__: %s\n", __COMO__);
#endif

#ifdef __COMO_VERSION__
printf("__COMO_VERSION__: %s\n", __COMO_VERSION__);
#endif

#ifdef __DECC
printf("__DECC: %s\n", __DECC);
#endif

#ifdef __DECC_VER
printf("__DECC_VER: %s\n", __DECC_VER);
#endif

#ifdef __DECCXX
printf("__DECCXX: %s\n", __DECCXX);
#endif

#ifdef __DECCXX_VER
printf("__DECCXX_VER: %s\n", __DECCXX_VER);
#endif

#ifdef __VAXC
printf("__VAXC: %s\n", __VAXC);
#endif

#ifdef VAXC
printf("VAXC: %s\n", VAXC);
#endif

#ifdef _CRAYC
printf("_CRAYC: %s\n", _CRAYC);
#endif

#ifdef _RELEASE
printf("_RELEASE: %s\n", _RELEASE);
#endif

#ifdef _RELEASE_MINOR
printf("_RELEASE_MINOR: %s\n", _RELEASE_MINOR);
#endif

#ifdef __CYGWIN__
printf("__CYGWIN__: %s\n", __CYGWIN__);
#endif

#ifdef __DCC__
printf("__DCC__: %s\n", __DCC__);
#endif

#ifdef __VERSION_NUMBER__
printf("__VERSION_NUMBER__: %s\n", __VERSION_NUMBER__);
#endif

#ifdef __DMC__
printf("__DMC__: %s\n", __DMC__);
#endif

#ifdef __SC__
printf("__SC__: %s\n", __SC__);
#endif

#ifdef __ZTC__
printf("__ZTC__: %s\n", __ZTC__);
#endif

#ifdef __DMC__
printf("__DMC__: %s\n", __DMC__);
#endif

#ifdef __SYSC__
printf("__SYSC__: %s\n", __SYSC__);
#endif

#ifdef __SYSC_VER__
printf("__SYSC_VER__: %s\n", __SYSC_VER__);
#endif

#ifdef __DJGPP__
printf("__DJGPP__: %s\n", __DJGPP__);
#endif

#ifdef __DJGPP_MINOR__
printf("__DJGPP_MINOR__: %s\n", __DJGPP_MINOR__);
#endif

#ifdef __GO32__
printf("__GO32__: %s\n", __GO32__);
#endif

#ifdef __PATHCC__
printf("__PATHCC__: %s\n", __PATHCC__);
#endif

#ifdef __PATHCC_MINOR__
printf("__PATHCC_MINOR__: %s\n", __PATHCC_MINOR__);
#endif

#ifdef __PATHCC_PATCHLEVEL__
printf("__PATHCC_PATCHLEVEL__: %s\n", __PATHCC_PATCHLEVEL__);
#endif

#ifdef __EDG__
printf("__EDG__: %s\n", __EDG__);
#endif

#ifdef __EDG_VERSION__
printf("__EDG_VERSION__: %s\n", __EDG_VERSION__);
#endif

#ifdef __ghs__
printf("__ghs__: %s\n", __ghs__);
#endif

#ifdef __GHS_VERSION_NUMBER__
printf("__GHS_VERSION_NUMBER__: %s\n", __GHS_VERSION_NUMBER__);
#endif

#ifdef __GHS_REVISION_DATE__
printf("__GHS_REVISION_DATE__: %s\n", __GHS_REVISION_DATE__);
#endif

#ifdef __HP_cc
printf("__HP_cc: %s\n", __HP_cc);
#endif

#ifdef __HP_aCC
printf("__HP_aCC: %s\n", __HP_aCC);
#endif

#ifdef __IAR_SYSTEMS_ICC__
printf("__IAR_SYSTEMS_ICC__: %s\n", __IAR_SYSTEMS_ICC__);
#endif

#ifdef __VER__
printf("__VER__: %s\n", __VER__);
#endif

#ifdef __xlc__
printf("__xlc__: %s\n", __xlc__);
#endif

#ifdef __xlC__
printf("__xlC__: %s\n", __xlC__);
#endif

#ifdef __IBMC__
printf("__IBMC__: %s\n", __IBMC__);
#endif

#ifdef __IBMCPP__
printf("__IBMCPP__: %s\n", __IBMCPP__);
#endif

#ifdef __COMPILER_VER__
printf("__COMPILER_VER__: %s\n", __COMPILER_VER__);
#endif

#ifdef __IMAGECRAFT__
printf("__IMAGECRAFT__: %s\n", __IMAGECRAFT__);
#endif

#ifdef __ICC
printf("__ICC: %s\n", __ICC);
#endif

#ifdef __ECC
printf("__ECC: %s\n", __ECC);
#endif

#ifdef __ICL
printf("__ICL: %s\n", __ICL);
#endif

#ifdef __INTEL_COMPILER
printf("__INTEL_COMPILER: %s\n", __INTEL_COMPILER);
#endif

#ifdef __INTEL_COMPILER_BUILD_DATE
printf("__INTEL_COMPILER_BUILD_DATE: %s\n", __INTEL_COMPILER_BUILD_DATE);
#endif

#ifdef __ICC
printf("__ICC: %s\n", __ICC);
#endif

#ifdef __ECC
printf("__ECC: %s\n", __ECC);
#endif

#ifdef __ICL
printf("__ICL: %s\n", __ICL);
#endif

#ifdef __INTEL_COMPILER
printf("__INTEL_COMPILER: %s\n", __INTEL_COMPILER);
#endif

#ifdef __INTEL_COMPILER_BUILD_DATE
printf("__INTEL_COMPILER_BUILD_DATE: %s\n", __INTEL_COMPILER_BUILD_DATE);
#endif

#ifdef __CA__
printf("__CA__: %s\n", __CA__);
#endif

#ifdef __KEIL__
printf("__KEIL__: %s\n", __KEIL__);
#endif

#ifdef __CA__
printf("__CA__: %s\n", __CA__);
#endif

#ifdef __C166__
printf("__C166__: %s\n", __C166__);
#endif

#ifdef __C51__
printf("__C51__: %s\n", __C51__);
#endif

#ifdef __CX51__
printf("__CX51__: %s\n", __CX51__);
#endif

#ifdef __LCC__
printf("__LCC__: %s\n", __LCC__);
#endif

#ifdef __llvm__
printf("__llvm__: %s\n", __llvm__);
#endif

#ifdef __HIGHC__
printf("__HIGHC__: %s\n", __HIGHC__);
#endif

#ifdef __MWERKS__
printf("__MWERKS__: %s\n", __MWERKS__);
#endif

#ifdef __MINGW32__
printf("__MINGW32__: %s\n", __MINGW32__);
#endif

#ifdef __MINGW32_MAJOR_VERSION
printf("__MINGW32_MAJOR_VERSION: %s\n", __MINGW32_MAJOR_VERSION);
#endif

#ifdef __MINGW32_MINOR_VERSION
printf("__MINGW32_MINOR_VERSION: %s\n", __MINGW32_MINOR_VERSION);
#endif

#ifdef __sgi
printf("__sgi: %s\n", __sgi);
#endif

#ifdef sgi
printf("sgi: %s\n", sgi);
#endif

#ifdef _COMPILER_VERSION
printf("_COMPILER_VERSION: %s\n", _COMPILER_VERSION);
#endif

#ifdef _SGI_COMPILER_VERSION
printf("_SGI_COMPILER_VERSION: %s\n", _SGI_COMPILER_VERSION);
#endif

#ifdef __MRC__
printf("__MRC__: %s\n", __MRC__);
#endif

#ifdef MPW_C
printf("MPW_C: %s\n", MPW_C);
#endif

#ifdef MPW_CPLUS
printf("MPW_CPLUS: %s\n", MPW_CPLUS);
#endif

#ifdef _MSC_VER
printf("_MSC_VER: %s\n", _MSC_VER);
#endif

#ifdef _MSC_FULL_VER
printf("_MSC_FULL_VER: %s\n", _MSC_FULL_VER);
#endif

#ifdef _MSC_BUILD
printf("_MSC_BUILD: %s\n", _MSC_BUILD);
#endif

#ifdef _MRI
printf("_MRI: %s\n", _MRI);
#endif

#ifdef __CC_NORCROFT
printf("__CC_NORCROFT: %s\n", __CC_NORCROFT);
#endif

#ifdef __ARMCC_VERSION
printf("__ARMCC_VERSION: %s\n", __ARMCC_VERSION);
#endif

#ifdef __PACIFIC__
printf("__PACIFIC__: %s\n", __PACIFIC__);
#endif

#ifdef _PACC_VER
printf("_PACC_VER: %s\n", _PACC_VER);
#endif

#ifdef __POCC__
printf("__POCC__: %s\n", __POCC__);
#endif

#ifdef __PGI
printf("__PGI: %s\n", __PGI);
#endif

#ifdef __CC_ARM
printf("__CC_ARM: %s\n", __CC_ARM);
#endif

#ifdef __ARMCC_VERSION
printf("__ARMCC_VERSION: %s\n", __ARMCC_VERSION);
#endif

#ifdef SASC
printf("SASC: %s\n", SASC);
#endif

#ifdef __SASC
printf("__SASC: %s\n", __SASC);
#endif

#ifdef __SASC__
printf("__SASC__: %s\n", __SASC__);
#endif

#ifdef __VERSION__
printf("__VERSION__: %s\n", __VERSION__);
#endif

#ifdef __REVISION__
printf("__REVISION__: %s\n", __REVISION__);
#endif

#ifdef __SASC__
printf("__SASC__: %s\n", __SASC__);
#endif

#ifdef _SCO_DS
printf("_SCO_DS: %s\n", _SCO_DS);
#endif

#ifdef SDCC
printf("SDCC: %s\n", SDCC);
#endif

#ifdef __SUNPRO_C
printf("__SUNPRO_C: %s\n", __SUNPRO_C);
#endif

#ifdef __SUNPRO_CC
printf("__SUNPRO_CC: %s\n", __SUNPRO_CC);
#endif

#ifdef __TenDRA__
printf("__TenDRA__: %s\n", __TenDRA__);
#endif

#ifdef __TINYC__
printf("__TINYC__: %s\n", __TINYC__);
#endif

#ifdef _UCC
printf("_UCC: %s\n", _UCC);
#endif

#ifdef _MAJOR_REV
printf("_MAJOR_REV: %s\n", _MAJOR_REV);
#endif

#ifdef _MINOR_REV
printf("_MINOR_REV: %s\n", _MINOR_REV);
#endif

#ifdef __USLC__
printf("__USLC__: %s\n", __USLC__);
#endif

#ifdef __SCO_VERSION
printf("__SCO_VERSION: %s\n", __SCO_VERSION);
#endif

#ifdef __WATCOMC__
printf("__WATCOMC__: %s\n", __WATCOMC__);
#endif

}
