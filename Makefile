# ITC Makefile
MK=mkdir -p
RM=sudo rm -rf
ML=sudo ln -s 
bindir=/usr/bin

BUNDLE_NAME=SK ITCloud Dokuwiki Bundle
BUNDLE_SOURCE:=$(shell dirname $(realpath $(lastword $(MAKEFILE_LIST))))
BUNDLE_BIN=${BUNDLE_SOURCE}/bin
BUNDLE_CGI_BIN=${BUNDLE_SOURCE}/cgi-bin
BUNDLE_SRC=${BUNDLE_SOURCE}/src
BUNDLE_LIB=${BUNDLE_SOURCE}/vendor
BUNDLE_DOC=${BUNDLE_SOURCE}/doc
BUNDLE_TEST=${BUNDLE_SOURCE}/tests

BUNDLE_CONSOLE_NAME=itc-dokuwiki
BUNDLE_CONSOLE_BIN=${BUNDLE_BIN}/${BUNDLE_CONSOLE_NAME}
BUNDLE_CONSOLE_CLEAN=${RM} ${bindir}/${BUNDLE_CONSOLE_NAME}
BUNDLE_CONSOLE_INSTALL=${ML} ${BUNDLE_CONSOLE_BIN} ${bindir}/${BUNDLE_CONSOLE_NAME}
BUNDLE_CONSOLE_UPDATE=\
	${BUNDLE_CONSOLE_CLEAN} \
	&& ${BUNDLE_CONSOLE_INSTALL}

BUNDLE_INITD_NAME=itc-initd
BUNDLE_INITD_BIN=${BUNDLE_BIN}/${BUNDLE_INITD_NAME}
BUNDLE_INITD_CLEAN=${RM} ${bindir}/${BUNDLE_INITD_NAME}
BUNDLE_INITD_INSTALL= ${ML} ${BUNDLE_INITD_BIN} ${bindir}/${BUNDLE_INITD_NAME}
BUNDLE_INITD_UPDATE=\
	${BUNDLE_INITD_CLEAN} \
	&& ${BUNDLE_INITD_INSTALL}

BUNDLE_FPM_NAME=itc-fpm
BUNDLE_FPM_BIN=${BUNDLE_BIN}/${BUNDLE_FPM_NAME}
BUNDLE_FPM_CLEAN=${RM} ${bindir}/${BUNDLE_FPM_NAME}
BUNDLE_FPM_INSTALL= ${ML} ${BUNDLE_FPM_BIN} ${bindir}/${BUNDLE_FPM_NAME}
BUNDLE_FPM_UPDATE=\
	${BUNDLE_FPM_CLEAN} \
	&& ${BUNDLE_FPM_INSTALL}

BUNDLE_BIN_CLEAN= \
	${BUNDLE_CONSOLE_CLEAN} \
	&&	${BUNDLE_INITD_CLEAN} \
	&&	${BUNDLE_FPM_CLEAN}

BUNDLE_BIN_INSTALL= \
	${BUNDLE_CONSOLE_INSTALL} \
	&&	${BUNDLE_INITD_INSTALL} \
	&&	${BUNDLE_FPM_INSTALL}

BUNDLE_BIN_UPDATE= \
		${BUNDLE_CONSOLE_UPDATE} \
	&&	${BUNDLE_INITD_UPDATE} \
	&&	${BUNDLE_FPM_UPDATE}

BUNDLE_CGI_BIN_API=${BUNDLE_CGI_BIN}/itc.cgi

# ITC COMPOSER
BUNDLE_COMPOSER_PRG=composer
BUNDLE_COMPOSER_OPTIONS=\
	--verbose \
	--profile
BUNDLE_COMPOSER_CMD=${BUNDLE_COMPOSER_PRG} ${BUNDLE_COMPOSER_OPTIONS}
BUNDLE_COMPOSER_VENDOR=${BUNDLE_LIB}
BUNDLE_COMPOSER_VENDOR_RM=${RM} ${BUNDLE_COMPOSER_VENDOR}
BUNDLE_COMPOSER_VENDOR_MK=${MK} ${BUNDLE_COMPOSER_VENDOR}
BUNDLE_COMPOSER_LOCK=${BUNDLE_SOURCE}/composer.lock
BUNDLE_COMPOSER_LOCK_RM=${RM} ${BUNDLE_COMPOSER_LOCK}

BUNDLE_COMPOSER_CLEAN=\
	${BUNDLE_COMPOSER_CMD} clear \
	&& ${BUNDLE_COMPOSER_VENDOR_RM} \
	&& ${BUNDLE_COMPOSER_LOCK_RM}
BUNDLE_COMPOSER_INSTALL=${BUNDLE_COMPOSER_CMD} install
BUNDLE_COMPOSER_UPDATE=${BUNDLE_COMPOSER_CMD} update

# ITC PHPUNIT
BUNDLE_TEST_PHPUNIT_PRG=phpunit
BUNDLE_TEST_PHPUNIT_OPTIONS=\
	--debug 

BUNDLE_TEST_PHPUNIT_CMD=${BUNDLE_TEST_PHPUNIT_PRG} ${BUNDLE_TEST_PHPUNIT_OPTIONS} 
BUNDLE_TEST_PHPUNIT_REPORT=${BUNDLE_DOC}/phpunit
BUNDLE_TEST_PHPUNIT_CLEAN=${RM} ${BUNDLE_TEST_PHPUNIT_REPORT}
BUNDLE_TEST_PHPUNIT_INSTALL=${BUNDLE_TEST_PHPUNIT_CMD}
BUNDLE_TEST_PHPUNIT_UPDATE=\
	${BUNDLE_TEST_PHPUNIT_CLEAN} \
	&& ${BUNDLE_TEST_PHPUNIT_INSTALL}

# ITC APIGEN
BUNDLE_APIGEN_OUTPUT=${BUNDLE_DOC}/api
BUNDLE_APIGEN_TITLE=${BUNDLE_NAME} Source Code API
BUNDLE_APIGEN_CMD=apigen
BUNDLE_APIGEN_CMD_OPTIONS= \
		-s ${BUNDLE_SRC} \
		-s ${BUNDLE_LIB} \
		-s ${BUNDLE_TEST} \
		-d '${BUNDLE_APIGEN_OUTPUT}' \
		--title='${BUNDLE_APIGEN_TITLE}'

BUNDLE_APIGEN_INSTALL=${BUNDLE_APIGEN_CMD} generate ${BUNDLE_APIGEN_CMD_OPTIONS}
BUNDLE_APIGEN_CLEAN= ${RM} ${BUNDLE_APIGEN_OUTPUT}
#BUNDLE_APIGEN_UPDATE=${BUNDLE_APIGEN_INSTALL}

# ITC UML
BUNDLE_UML_XMI_OUTPUT=${BUNDLE_SRC}/SK/ITCBundle/Resources/model/itc-bundle.xmi
BUNDLE_UML_XMI_SRC=${BUNDLE_SRC}
BUNDLE_UML_XMI_TITLE=${BUNDLE_NAME} UML XMI
BUNDLE_UML_XMI_CMD=${BUNDLE_BIN}/phpuml
BUNDLE_UML_XMI_CMD_OPTIONS= \
		-o '${BUNDLE_UML_XMI_OUTPUT}' \
		-f xmi \
		-n '${BUNDLE_UML_XMI_TITLE}' \
		${BUNDLE_UML_XMI_SRC}

BUNDLE_UML_XMI=	${BUNDLE_UML_XMI_CMD} ${BUNDLE_UML_XMI_CMD_OPTIONS}

# ITC UML DOC
BUNDLE_UML_DOC_OUTPUT=${BUNDLE_DOC}/uml
BUNDLE_UML_DOC_SRC=${BUNDLE_SRC}
BUNDLE_UML_DOC_TITLE=${BUNDLE_NAME} UML
BUNDLE_UML_DOC_CMD=${BUNDLE_BIN}/phpuml
BUNDLE_UML_DOC_CMD_OPTIONS= \
		-o '${BUNDLE_UML_DOC_OUTPUT}' \
		-f htmlnew \
		-n '${BUNDLE_UML_DOC_TITLE}' \
		${BUNDLE_UML_DOC_SRC}

BUNDLE_UML_DOC= \
	${MK} ${BUNDLE_UML_DOC_OUTPUT} \
	&& ${BUNDLE_UML_DOC_CMD} ${BUNDLE_UML_DOC_CMD_OPTIONS}

BUNDLE_UML_UPDATE= \
	${BUNDLE_UML_XMI} \
	&& ${BUNDLE_UML_DOC}
 
BUNDLE_UML_INSTALL=	${BUNDLE_UML_UPDATE}

BUNDLE_UML_CLEAN= \
	${RM} ${BUNDLE_UML_XMI_OUTPUT} \
	&& ${RM} ${BUNDLE_UML_DOC_OUTPUT}

####################
# Bundle Build     #
####################

BUNDLE_CLEAN= \
	${RM} ${BUNDLE_UML_DOC_OUTPUT} \
	&& ${BUNDLE_BIN_CLEAN} \
	&& ${BUNDLE_COMPOSER_CLEAN} \
	&& ${BUNDLE_UML_CLEAN}
#	&& ${BUNDLE_TEST_PHPUNIT_CLEAN} \
	&& ${BUNDLE_APIGEN_CLEAN} 

BUNDLE_INSTALL=\
	${BUNDLE_COMPOSER_INSTALL} \
	&& ${BUNDLE_BIN_INSTALL} \
	&& ${BUNDLE_UML_INSTALL}

BUNDLE_UPDATE= \
	${BUNDLE_COMPOSER_UPDATE} \
	&& ${BUNDLE_BIN_UPDATE} \
	&& ${BUNDLE_UML_UPDATE}

BUNDLE_TEST= \
	${BUNDLE_TEST_PHPUNIT_UPDATE}

BUNDLE_DOCUMENTATION= ${BUNDLE_UML_DOC}
	#${BUNDLE_APIGEN_INSTALL} \
	#&& 

BUNDLE_ALL=${BUNDLE_INSTALL} \
	&& ${BUNDLE_DOCUMENTATION}
	#${BUNDLE_CLEAN} 

####################
# Make             #
####################

all:
	${BUNDLE_ALL}

clean:
	${BUNDLE_CLEAN}

update:
	${BUNDLE_UPDATE}

install:
	${BUNDLE_INSTALL}

test:
	${BUNDLE_TEST}

doc: 
	${BUNDLE_DOCUMENTATION}

apigen:
	${BUNDLE_APIGEN_INSTALL}

uml:
	${BUNDLE_UML_XMI}

umldoc:
	${BUNDLE_UML_DOC}

xsd:

	mkdir -p src/SK/ITC/DokuwikiBundle/UML/XMI

	xsd2php convert:php \
		./src/SK/ITCBundle/Resources/model/XMI.xsd  \
		--ns-map='http://schema.omg.org/spec/XMI/2.1;SK\ITC\DokuwikiBundle\UML\XMI' \
		--ns-dest="SK\ITC\DokuwikiBundle\UML\XMI\;src/SK/ITC/DokuwikiBundle/UML/XMI"